<?php

$timestamps =FALSE;
class Comment extends Eloquent{

    protected  $table = 'comment';

    public static function select($com)
    {
        $comment = new Comment();
        $comment->content = htmlspecialchars($com['comment']);
        $user = Session::get('user');
        $comment->user_id = Customer::where('name',$user)->pluck('id');
        $comment->photo_id = $com['id'];
        $comment->save();
    }
}