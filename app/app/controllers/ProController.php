<?php
class ProController extends BaseController
{
	public function Post_Add()
	{
		$validate=Projects::validate(Input::all());
		if($validate->fails()):
		return Redirect::back()
			->withErrors($validate);
		else:
			$pro=Projects::create([
				"name"=>Input::get("name"),
				"admin"=>Auth::id(),
				"org_id"=>Input::get("id")
				]);
		$prouser=ProUsers::create([
				"user_id"=>Auth::id(),
				"pro_id"=>$pro->id
				]);
        if($pro):
		return Redirect::back()
			->with("error",false)
			->with("msg","Project successfully added");
			else:
			return Redirect::back()
			->with("error",true)
			->with("msg","Error occured during process");
            endif;
		endif;
	}

	public function Post_AddUser()
	{
		$validate=OrgUser::validate(Input::all());
		if($validate->fails()):
			return Redirect::back()
				->withErrors($validate);
				else:

					$user=User::where("email","=",Input::get("user_email"))->get();
				foreach($user as $user)
				{

						OrgUser::create([
				"user_id"=>$user->id,
				"org_id"=>Input::get("org_id")
				]);
						return Redirect::back()
						->with("error",false)
			->with("msg","Project successfully added");

				}
				
				
					
				endif;

	}


	public function Post_AddProUser()
	{
		$validate=ProUser::validate(Input::all());
		if($validate->fails()):
			return Redirect::back()
				->withErrors($validate);
				else:

					$user=User::where("email","=",Input::get("user_email"))->get();
				foreach($user as $user)
				{

						ProUser::create([
				"user_id"=>$user->id,
				"pro_id"=>Input::get("pro_id")
				]);
						return Redirect::back()
						->with("error",false)
			->with("msg","User successfully added");

				}
				
				
					
				endif;

	}
}
?>