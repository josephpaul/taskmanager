<?php 

class UserTask extends Eloquent
{
	protected $table="user_task";

	public function user()
	{
	return $this->belongsTo("User", "user_id", "id");
	}
	public function task()
	{
		return $this->belongsTo("Task", "id", "task_id");
	}
}

?>