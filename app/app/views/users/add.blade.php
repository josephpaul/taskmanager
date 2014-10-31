@extends("layouts.master")
@section("title")
Add User
@stop

@section("right")

@if($errors->has())
<div role="alert" class="alert alert-danger">
{{
$errors->first("name","<p>:message</p>")
}}
{{
$errors->first("email","<p>:message</p>")
}}{{
$errors->first("pass","<p>:message</p>")
}}
{{
$errors->first("pass2","<p>:message</p>")
}}
</div> 
@endif


{{
Form::open(["url"=>URL::to('user/addnew'),"method"=>"post"])
}}

<div class="form-group">
<div class="col-sm-3 control-label">{{ Form::label('name', 'Name :')}}</div>
<div class="col-sm-9">{{ Form::text('name', null, array('class'=>'form-control') ) }}</div>
</div>
<div class="form-group">
<div class="col-sm-3 control-label">{{ Form::label('email', 'Email :')}}</div>
<div class="col-sm-9">{{ Form::text('email', null, array('class'=>'form-control') ) }}</div>
</div>
<div class="form-group">
<div class="col-sm-3 control-label">{{ Form::label('pass', 'Password :')}}</div>
<div class="col-sm-9">{{ Form::password('pass', array('class'=>'form-control') ) }}</div>
</div>
<div class="form-group">
<div class="col-sm-3 control-label">{{ Form::label('pass2', 'Confirm Password :')}}</div>
<div class="col-sm-9">{{ Form::password('pass2', array('class'=>'form-control') ) }}</div>
</div>
<div class="form-group">
<div class="col-sm-3"></div>
<div class="col-sm-9">{{ Form::submit('Submit', ["class"=>"btn btn-primary"]) }}</div>
</div>

{{ Form::close() }}
@stop