<?php
class OrgController extends BaseController
	{
		public function Get_Add()
		{
			return View::make("org.add")
			->with("page","Org");
		}

		public function Post_Add()
		{
			$validate=Org::validate(Input::all());
			if($validate->fails()):
				return Redirect::route("OrgAdd")
			    ->withErrors($validate)
			    ->withInput();
			    else:

			
			$org=Org::create(['name'=>Input::get('name'),"admin"=>Auth::id()]);
			$org_id=$org->id;
			OrgUser::create(['user_id'=>Auth::id(),"org_id"=>$org_id]);
			return Redirect::route("OrgAdd")
			->with("error",false)
			->with("msg","orginasation successfully added");
			endif;
		}
	}
?>