<?php
class Customer extends Eloquent{
    
    protected $table = 'user';

    public static function register ($data)
    {
        $register = new Customer();
        $register->name = $data['name'];
        $register->password = $data['password'];
        $register->email = $data['email'];
        $register->save();
    }

}