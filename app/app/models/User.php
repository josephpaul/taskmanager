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
	protected $table="user_details";

	protected $fillable=["name","email","password","remember_token","code","active"];

	static $signup_rule=[
	"name"=>"required|min:3|max:30",
	"email"=>"required|email|unique:user_details",
	"pass"=>"required|min:6|max:15",
	"pass2"=>"required|same:pass"
	];

	static $login_rule=[
	"username"=>"required|email|exists:user_details,email",
	"password"=>"required|min:6|max:15"
	];



	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public static $aname=["pass"=>"Password","pass2"=>"Repeat Password"];

	public static function validate($data)
	{
		$validate=Validator::make($data,static::$signup_rule);
		$validate->setAttributeNames(static::$aname);
		return $validate;
	}

	public static function validate_login($data)
	{
		$validate=Validator::make($data,static::$login_rule);
		return $validate;
	}


	public function org()
	{
		return $this->belongsTo('Org', '');
	}

	public function orguser()
	{
		return $this->belongsTo('OrgUser', "id", "user_id");
	}

	public function usertask()
	{
		return $this->hasMany("UserTask", "user_id", "id");
	}



}
