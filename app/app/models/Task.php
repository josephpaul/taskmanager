<?php
class Task extends Eloquent
{
	protected $table="task_details";

	protected $fillable=["title","des","admin","org_id","pro_id", "assign_to","date","time"];

	static $rule=[
	"title"=>"required|min:3|max:50",
	"des"=>"required|min:5|max:500",
	"assin"=>"required"];


}
?>
