<?php
class Projects extends Eloquent
{
	protected $table="project_details";

	protected $fillable=["name","admin","org_id"];

	static $rule=["name"=>"required|min:3|max:50"];

	public static function validate($data)
	{
		$validate=Validator::make($data,static::$rule);
		return $validate;
	}

	public function org()
	{
		return $this->belongsTo('Org', 'org_id', 'id');
	}
     
     public function task()
     {
     	return $this->hasMany('Task', 'pro_id', 'id');
     }

}
?>