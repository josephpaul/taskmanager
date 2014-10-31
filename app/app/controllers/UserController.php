<?php
class UserController extends BaseController
{
	public function Get_Add()
	{
		return View::make("users.add")
		->with("page","user");
	}

	public function Post_Add()
	{
		$validate=User::validate(Input::all());

		if($validate->fails()):
			return Redirect::back()
			    ->withErrors($validate)
			    ->withInput();
			    else:

			    $pass=Hash::make(Input::get("pass"));
			$code=str_random(60);

			 $user=User::create(['name'=>Input::get('name'),
			 	'email'=>Input::get("email"),
			 	"password"=>$pass,
			 	"code"=>$code
			 	]);
			 Mail::send('emails.confimation', array('name' => $user->name,"id"=>$user->id,"code"=>$user->code), function($message)
{
    $message->to('sarathlk007@gmail.com', 'sharath l k')->subject('confirm mail @ tma');
});
			return Redirect::back()
			->with("error",false)
			->with("msg","User successfully added");
			endif;
	}

	public function Get_emailconfirm($id,$code)
	{
		$user=User::find($id);
			if($code==$user->code):
				$user->code="";
				$user->active=1;
				$user->save();
				else:
					echo "Invalid code";

				endif;
	}

	public function Get_login()
	{
		return View::make("users.login");
	}


	public function Post_login()
	{
		$validate=User::validate_login(Input::all());

		if($validate->fails()):
			return Redirect::back()
			    ->withErrors($validate)
			    ->withInput();
			    else:
			    	//$password=Hash::Input::get("password");
			    	$remember=(Input::has("rememberme"))?true:false;
		$user=User::where("email",Input::get('username'))->first();
		$var=["email"=>Input::get("username"),"password"=>Input::get("password"),"active"=>1];
		$auth=Auth::attempt($var,$remember);
		if($auth):
		return Redirect::intended('/home');
		else:
			return Redirect::back()->withError(true)->with("msg","Invalid email id or password")->withInput();
		endif;
	endif;

	}
}

?>