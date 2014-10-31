@extends("layouts.master")

@section('title')
Login
@stop

@section("right")

@if($errors->has())
<div role="alert" class="alert alert-danger">

{{
$errors->first("username","<p>:message</p>")
}}{{
$errors->first("password","<p>:message</p>")
}}

</div> 
@endif

{{Form::open(["url"=>URL::to('login'),"method"=>"post"])}}
<div class="form-group">
<div class="col-sm-3 control-label">{{ Form::label('username', 'Username :')}}</div>
<div class="col-sm-9">{{ Form::text('username', null, array('class'=>'form-control') ) }}</div>
</div>
<div class="form-group">
<div class="col-sm-3 control-label">{{ Form::label('password', 'Password :')}}</div>
<div class="col-sm-9">{{ Form::password('password', array('class'=>'form-control') ) }}</div>
</div>
<div class="form-group">
<div class="col-sm-3"></div>
<div class="col-sm-1">{{ Form::checkbox('rememberme' ) }}</div>
<div class="col-sm-8 control-label">{{ Form::label('rememberme', 'Remember Me :')}}</div>

</div>
<div class="form-group">
<div class="col-sm-3"></div>
<div class="col-sm-9">{{ Form::submit('Submit', ["class"=>"btn btn-primary"]) }}</div>
</div>
{{Form::close()}}
@stop