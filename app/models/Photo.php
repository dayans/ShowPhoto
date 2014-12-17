<?php
$timestamps =FALSE;
class Photo extends Eloquent{

    protected  $table = 'photo';

    public static function insert($data)
    {
        $photo = new Photo();
        $photo->address = "/img/" . $data['fileName'];
        $photo->introduce = $data['introduce'];
        $photo->user_id = $data['id'];
        $photo->save();
    }
}