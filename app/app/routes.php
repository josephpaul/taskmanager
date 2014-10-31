<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get("login","UserController@Get_login");

Route::post("login","UserController@Post_login");

Route::get('/', function()
{
	return View::make('hello');
});

Route::group(["before"=>"auth"],function()
	{


Route::get('/home',function()
{
	return View::make('home')
	->with("page","home");
});

Route::get("/org/add", ['as'=>'OrgAdd', 'uses'=>'OrgController@Get_Add']);

Route::post("/org/addnew","OrgController@Post_Add");

Route::get("org",function()
{
	return View::make("org.list")
	->with("org",Org::where("admin",Auth::id())->paginate(2))
	->with("page","org");
});

Route::get("signup",["as"=>"Signup", "uses"=>"UserController@Get_Add"]);

Route::post("user/addnew","UserController@Post_Add");

Route::get("/emailconfirm/{id}/{code}","UserController@Get_Emailconfirm");

Route::get("org/{id}",function($id){

$tmp=Org::find($id)->orguser;
//print_r($tmp);


// foreach($tmp as $tmp):
// 	foreach($tmp->user as $tmp1):
//   echo $tmp1->name."<br>";
//      endforeach;
// 	endforeach;


// exit;




return View::make("org.home")
->with("pro",Projects::where("org_id","=",$id)
->where("admin","=",Auth::id())->get())
->withId($id)
->with("orgusr",$tmp);
});

Route::post("pro","ProController@Post_Add");

Route::get("signout",function(){
Auth::logout();
return Redirect::to("login")
->withError(false)
->withMsg("Successfully Signout");
});

Route::get("project/{org_id}/{id}",function($org_id,$id){
	$userid=Org::find($org_id)->orguser;
	foreach($userid as $userid)
		{
		$tem=$userid->user_id;
		 $username[]=User::find($tem);
		 //echo $username->name;
		// foreach ($userid as  $value) {
		// 	# code...
		// 	echo $value->user->name;
		// }
		}

		
	// exit();
return View::make("projects.home")
->with(["org_id"=>$org_id,"id"=>$id])
->with("page","pro")
->with("username",$username)
->with("task",Task::where("admin",'=',Auth::id())
	->where("org_id","=",$org_id)
	->where("pro_id","=",$id)
	->get());
//->with("username",Org::find($org_id)->orguser);
});

Route::get("project/{org_id}/{id}/add",function($org_id,$id){
	//$userd=User::where("org","=",);
	$prouser=ProUser::where("pro_id", "=", $id)->get();



    //echo $pro->org->orguser;exit;
   //$orguser=OrgUser::find(1)->org;

   // echo $orguser->user;exit;
    //echo $pro->org->orguser;
    // $tmp=$pro->org->orguser;


return View::make("projects.add")
->with(["org_id"=>$org_id,"id"=>$id])
->with("page","proadd")
->withProuser($prouser);
});

Route::post("project/{org_id}/{id}/addnew","TaskController@Post_Add");




Route::get("/test",function()
	{
	$org=Org::find(7)->projects();
	print_r("adfa".$org);
	});

Route::post("/pro/adduser","ProController@Post_AddUser");

Route::post("pro/adduspro","ProController@Post_AddProUser");


});


//Just finished