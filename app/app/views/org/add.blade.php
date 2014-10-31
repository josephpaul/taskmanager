@extends('layouts.master')
@section("title")
Add New
@stop

@section("right")

@if($errors->has())
<div role="alert" class="alert alert-danger">
{{
$errors->first("name","<p>:message</p>");
}}
</div> 
@endif

@if(isset($msg))
{{
$msg
}}
@endif
{{ Form::open(["url"=>URL::to('org/addnew'), "method"=>"post", "class"=>""]) }}
<div class="form-group">
<div class="col-sm-3 control-label">{{ Form::label('name', 'Name :')}}</div>
<div class="col-sm-9">{{ Form::text('name', null, array('class'=>'form-control') ) }}</div>
</div>
<div class="form-group">
<div class="col-sm-3"></div>
<div class="col-sm-9">{{ Form::submit('Submit', ["class"=>"btn btn-primary"]) }}</div>
</div>
{{ Form::close() }}

@stop