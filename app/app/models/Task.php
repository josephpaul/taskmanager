<?php
class Task extends Eloquent
{
	protected $table="task_details";

	protected $fillable=["title","des","admin","org_id","pro_id", "assign_to","date","time"];

	static $rule=[
	"title"=>"required|min:3|max:50",
	"des"=>"required|min:5|max:500",
	"assin"=>"required"];

	public static function validate($data)
	{
		$validate=Validator::make($data,static::$rule);
		return $validate;
	}


	public function projects()
	{
	return $this->belongsTo("Projects", "pro_id", "id");
	}

    public function usertask()
    {
    	return $this->hasOne("UserTask", "task_id", "id");
    }

    public function user()
    {
    	return $this->belongsTo("User", "admin", "id");
    }


}
?>
