<?php

class UpdateController extends BaseController {
    
    public function check()
    {
        $input = Input::all();
    
        if (isset($input['identity'])) {
            if ($input['identity'] == 'user') {
                $user = Customer::where('name', $input['name'])
                ->where('password', $input['password'])->pluck('name');
                if (!empty($user)) {
                    Session::put('user', $user);
                    Return Redirect::to('user/display');
                } else {
                    return View::make('/warning')->with(array('message' => '请检查您的输入是否错误', 'route' => '/login'));
                }
            } else {
                $admin = Admin::where('name', $input['name'])
                ->where('password', $input['password'])->pluck('name');
                if (!empty($admin)) {
                    Return Redirect::to('admin/display');
                } else {
                    return View::make('/warning')->with(array('message' => '请检查您的输入是否错误', 'route' => '/login'));
                }
            }
        } else {
            return View::make('/warning')->with(array('message' => '请检查您的输入是否错误', 'route' => '/login'));
        }
    }
    
    public function upload()
    {
        if (Input::hasFile('img') && strlen(Input::get('words')) < 10) {
            $mime = Input::file('img')->getMimeType();
            if (($mime == "image/gif") || ($mime == "image/jpeg") || ($mime == "image/pjpeg")) {
                $file = input::file('img');
                 
                $data['fileName']  = time() . rand(0, 9) . $_FILES["img"]["name"];
                Input::file('img')->move("img/", $data['fileName']);
                $data['introduce'] = htmlspecialchars(Input::get('words'));
                $data['id'] = Customer::where('name',Session::get('user'))->pluck('id');
    
                Photo::insert($data);
    
                return View::make('warning')->with(array('message' => '上传成功', 'route' => 'user/display'));
            } else {
                return View::make('warning')->with(array('message' => '图片上传发生错误', 'route' => 'user/display'));
            }
        } else {
            if (!Input::hasFile('img')) {
                return View::make('warning')->with(array('message' => '图片上传发生错误', 'route' => 'user/display'));
            } else {
                return View::make('warning')->with(array('message' => '输入超过最大长度', 'route' => 'user/display'));
            }
        }
    }
    
    public function good($id)
    {
        $good = Photo::where('id', $id)->pluck('good_number');
        $good++;
        Photo::where('id', $id)->update(array('good_number' => $good));
        $result = array('code' => 0, 'num' => $good);
        echo $good;
    }
    
    public function comment()
    {
        $com = Input::all();
        if (strlen(Input::get('comment')) > 10) {
            return View::make('warning')->with(array('message' => '输入超过最大长度', 'route' => 'user/display'));
        }
        Comment::select($com);
    
        return Redirect::to('user/display');
    }
    
    public function del($id)
    {
        Photo::where('id', $id)->delete();
    }
    
    public function change()
    {
        $data = Input::all();
    
        Customer::where('id', '=', $data['id'])
        ->update(array('name' => $data['name'], 'password' => $data['password']));
    
        return Redirect::to('/inform');
    }
}