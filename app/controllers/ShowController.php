<?php

use Illuminate\Support\Facades\Redirect;

class ShowController extends BaseController {

    public function userDisplay()
    {
        $data['user'] = Session::get('user');
        
        $data['key'] = Photo::leftJoin('user', 'user_id', '=', 'user.id')
                       ->orderBy('photo.id', 'desc')
                       ->select(DB::raw('photo.*, user.name'))
                       ->get()->toArray();
        
        $data['com'] = Comment::join('user', 'user_id', '=', 'user.id')
                        ->select('comment.id', 'comment.photo_id', 'user.name', 'comment.content')
                        ->orderBy('id', 'desc')
                        ->get()->toArray();
        
        return View::make('userDisplay')->with('data', $data);
    }
    
    public function adminDisplay()
    {
        $data['user'] = Customer::select('id', 'name')
                                ->orderBy('id', 'desc')->get()->toArray();
        
        $data['photo'] = Photo::select('id', 'user_id', 'address', 'created_at')
                              ->orderBy('created_at', 'desc')->get()->toArray();
        
        return View::make('adminPhotoDisplay')->with('data', $data);
    }
    
    public function inform()
    {
        $data = Customer::all();
        
        Return View::make('inform')->with('data', $data);
    }
    
}