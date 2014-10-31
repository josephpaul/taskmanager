<?php
class ProUser extends Eloquent
{
	protected $table="project_users";

	protected $fillable=["user_id","pro_id"];
    
    static $rule=["user_email"=>"required|email|exists:user_details,email"];

    public static function validate($data)
	{
		$validate=Validator::make($data,static::$rule);
		return $validate;
	}

    public function user()
    {
    	return $this->belongsTo("User","user_id", "id");
    }




}
?>