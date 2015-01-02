<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	
	/*
	 * yans add
	 */
	public static function test($data)
	{
	    foreach($data as $key=>$val) {
    	    $data[$key] = htmlspecialchars($data[$key]);
    	    $data[$key] = trim($data[$key]);
    	    $data[$key] = stripslashes($data[$key]);
    	    
	    }
	    return $data;
	}
	
	public static function registerError($data)
	{
	    $er['v'] = 0;
	    foreach($data as $item) {
	        if(empty($item)) {
	            $er['v'] = 1;break;
	        }
	    }
	    if(empty($data['name'])) {
	        $er['name'] = '用户名不能为空';
	    }
	    if(empty($data['email'])) {
	        $er['email'] = '邮箱不能为空';
	    }
	    if(empty($data['password'])) {
	        $er['password'] = '密码不能为空';
	    }
	    if(empty($data['repassword'])) {
	        $er['repassword'] = '确认密码不能为空';
	    }
	    if(!empty($data['password']) && !empty($data['repassword']))) {
	        if($data['password'] != $data['repassword']) {
	            $er['v'] = 1;
	            $er['repassword'] = '确认密码与密码不一致';
	        }
	    }
	    return $er;
	}
	
	public static function rules($data) 
	{
	    $er['v'] = 0;
	    foreach($data as $key=>$value) {
	        if($key == 'name') {
	            $v = preg_match('/[a-zA-Z0-9\x{4E00}-\x{9FFF}]/u', $value);
	            if(!$v) {
	                $er['v'] = 1;
	                $er['name'] = '姓名格式不符'; 
	            }
	        }
	    }
	    return $er;
	}
}
