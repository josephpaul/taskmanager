@extends("layouts.master")
@section("title")
Add Project
@stop

@section("right")
@if($errors->has())
<div role="alert" class="alert alert-danger">
{{
$errors->first("title","<p>:message</p>")
}}
{{
$errors->first("des","<p>:message</p>")
}}
{{
$errors->first("assin","<p>:message</p>")
}}
{{
$errors->first("date","<p>:message</p>")
}}
{{
$errors->first("time","<p>:message</p>")
}}
</div> 
@endif
<?php 
//print_r($pro);exit();
?>
  
 


{{Form::open(["url"=>URL::to('project/'.$org_id.'/'.$id.'/addnew'),"method"=>"post"])}}

<div class="form-group">
<div class="col-sm-3 control-label">{{ Form::label('title', 'Title :')}}</div>
<div class="col-sm-9">{{ Form::text('title', null, array('class'=>'form-control') ) }}</div>
</div>
<div class="form-group">
<div class="col-sm-3 control-label">{{ Form::label('des', 'description :')}}</div>
<div class="col-sm-9">{{ Form::textarea('des', null, array('class'=>'form-control') ) }}</div>
</div>
<div class="form-group">
<div class="col-sm-3 control-label">{{ Form::label('assin', 'Assin To :')}}</div>
<div class="col-sm-9"><select name="assin">

  @foreach($prouser as $pro)
    <option value="{{$pro->user->id}}"> {{$pro->user->name }}</option>
    	@endforeach
		
	
</select></div>
</div>
<div class="form-group">
<div class="col-sm-3 control-label">{{ Form::label('date', 'Date :')}}</div>
<div class="col-sm-9">{{ Form::text('date',null, array('class'=>'form-control') ) }}</div>
</div>
<div class="form-group">
<div class="col-sm-3 control-label">{{ Form::label('time', 'Time :')}}</div>
<div class="col-sm-9">{{ Form::text('time',null, array('class'=>'form-control') ) }}</div>
</div>
<div class="form-group">
<div class="col-sm-3"></div>
<div class="col-sm-9">{{ Form::submit('Submit', ["class"=>"btn btn-primary"]) }}</div>
</div>

{{ Form::close() }}
@stop