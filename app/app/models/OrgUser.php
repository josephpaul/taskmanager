<?php
class OrgUser extends Eloquent
{
	protected $table="org_users";

	protected $fillable=["user_id","org_id"];

	static $rule=["user_email"=>"required|email|exists:user_details,email"];

    public static function validate($data)
	{
		$validate=Validator::make($data,static::$rule);
		return $validate;
	}

	public function user()
	{
	return $this->hasMany("User", "id", "user_id");
	}

	public function org()
	{
		return $this->belongsTo('Org', "org_id", "id");
	}




}
?>