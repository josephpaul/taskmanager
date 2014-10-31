@extends("layouts.master")
@section("title")
Home
@stop
@section("right")

@if($errors->has())
<div role="alert" class="alert alert-danger">
{{
$errors->first("name","<p>:message</p>");
}}
{{
$errors->first("user_email","<p>:message</p>");
}}
</div> 
@endif

<div class="col-sm-8 col-sm-offset-2">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Add Projects</h3>
  </div>
  <div class="panel-body">
    {{ Form::open(["url"=>URL::to('pro'), "method"=>"post"]) }}
    <div class="form-group">
<div class="col-sm-3 control-label">{{ Form::label('name', 'Name :')}}</div>
<div class="col-sm-9">{{ Form::text('name', null, array('class'=>'form-control') ) }}</div>
</div>
{{Form::hidden("org_id",$id)}}
<div class="form-group">
<div class="col-sm-3 control-label"></div>
<div class="col-sm-9">{{ Form::submit('Add', array('class'=>'btn btn-primary') ) }}</div>
</div>
    {{Form::close()}}
  </div>
</div>
</div>



<div class="col-sm-8 col-sm-offset-2">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Add Users</h3>
  </div>
  <div class="panel-body">
    {{ Form::open(["url"=>URL::to('pro/adduser'), "method"=>"post"]) }}
    <div class="form-group">
<div class="col-sm-3 control-label">{{ Form::label('user_email', 'User Email ID :')}}</div>
<div class="col-sm-9">{{ Form::text('user_email', null, array('class'=>'form-control') ) }}</div>
</div>
{{Form::hidden("org_id",$id)}}
<div class="form-group">
<div class="col-sm-3 control-label"></div>
<div class="col-sm-9">{{ Form::submit('Add', array('class'=>'btn btn-primary') ) }}</div>
</div>
    {{Form::close()}}
  </div>
</div>
</div>
<div class="col-sm-8 col-sm-offset-2">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">User List</h3>
  </div>
  <div class="panel-body">
   <table class="table"> 
   <tr>
   <th>
   #
   </th>
   <th>
   Name
   </th>
   <th>
   Email ID
   </th>
   </tr>

   @foreach($orgusr as $index1=>$tmp1)
   @foreach($tmp1->user as $tmp2)
<tr>
<td>
{{$index1+1}}
</td>
<td>
{{ $tmp2->name}}
</td>
<td>
{{$tmp2->email}}
</td>
</tr>
@endforeach
   @endforeach
   </table> 
  </div>
</div>
</div>


@stop

@section("left")
@if(isset($pro)&&$pro->count()>0)
<ul class="nav nav-pills nav-stacked">
@foreach($pro as $value)
  <li class=""><a href="{{URL::to('/')}}/project/{{$id}}/{{$value->id}}">{{ $value->name }}</a></li>

@endforeach
</ul>
@else
<div class="bg-danger">No Projects Avaliable</div>
@endif
@stop
