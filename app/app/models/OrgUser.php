<?php
class OrgUser extends Eloquent
{
	protected $table="org_users";

	protected $fillable=["user_id","org_id"];

	static $rule=["user_email"=>"required|email|exists:user_details,email"];



}
?>