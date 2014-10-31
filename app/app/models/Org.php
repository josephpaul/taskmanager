<?php
class Org extends Eloquent
{
	protected $table="org_details";

	protected $fillable=["name","admin"];

	static $rule=["name"=>"required|min:3|max:30"];

	public static function validate($data)
	{
		$validate=Validator::make($data,static::$rule);
		return $validate;
	}

	public function projects()
	{
	return $this->hasMany("Projects", "org_id", "id");
	}
	public function orguser()
	{
		return $this->hasMany("OrgUser", "org_id", "id");
	}
	
}

?>