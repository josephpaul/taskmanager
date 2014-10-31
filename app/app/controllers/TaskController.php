<?php
class TaskController extends BaseController
{

	public function Post_Add($org_id,$id)
	{
		$validate=Task::validate(Input::all());
		if($validate->fails()):
		return Redirect::back()
			->withErrors($validate)
			->withInput();
		else:
		// 	$assnid=User::where("email","=",Input::get("assin"))->get();
		//     foreach($assnid as $aid):
		//     	$aid=$aid;
		//     	endforeach;
		// print_r($aid->id);
		//exit();
			$task=Task::create([
				"title"=>Input::get("title"),
				"des"=>Input::get("des"),
				"date"=>Input::get("date"),
				"time"=>Input::get("time"),	
				"admin"=>Auth::id(),
				"org_id"=>$org_id,
				"pro_id"=>$id,
				"assign_to"=>Input::get("assin")
					
				]);

		if($task)
		{
			return Redirect::back()
			->with("error",false)
			->with("msg","Task successfully added");
		}else
		{
			return Redirect::back()
			->withError(true)
			->with("msg","Some error occur");
		}
		
		
			endif;
	}
}