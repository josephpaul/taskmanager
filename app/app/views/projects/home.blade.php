@extends("layouts.master")
@section("title")
projects
@stop

@section("left")

<ul class="nav nav-pills nav-stacked">
<li class="active"><a href="{{URL::to("/")}}/project/{{$org_id}}/{{$id}}/add">Add Task</a></li>
</ul>
<br/>
<br/>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Add Users</h3>
  </div>
  <div class="panel-body">
    {{ Form::open(["url"=>URL::to('pro/adduspro'), "method"=>"post"]) }}
    <div class="form-group">
<div class="col-sm-3 control-label">{{ Form::label('user_email', 'User Email ID :')}}</div>
<div class="col-sm-9"><select name="user_email">

@foreach ($username as $username) 
<option value="{{$username->email}}">{{$username->name}}</option>
@endforeach

 
</select></div>
</div>
{{Form::hidden("pro_id",$id)}}
<div class="form-group">
<div class="col-sm-3 control-label"></div>
<div class="col-sm-9">{{ Form::submit('Add', array('class'=>'btn btn-primary') ) }}</div>
</div>
    {{Form::close()}}
  </div>
</div>
@stop

@section("right")

@if($errors->has())
<div role="alert" class="alert alert-danger">

{{
$errors->first("user_email","<p>:message</p>");
}}
</div> 
@endif
<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Tasks</div>
  
@if(isset($task)&&$task->count()>0)
  <!-- Table -->
  <table class="table">
    <tr>
    <th>
    #
    </th>
    <th>
    Title
    </th>
    <th>
    Deadline
    </th>
    <th>
    Status
    </th>
    </tr>
    @foreach($task as $index=>$value)
    <tr>
    <td>
    {{$index+1}}
    </td>
    <td>
    {{$value->title}}
    </td>
    <td>
    {{$value->date}}
    </td>
    <td>
    {{$value->status}}
    </td>
    </tr>
    @endforeach
  </table>
</div>
@else
<div class="bg-danger">No Projects Avaliable</div>
@endif

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Tasks</div>
  <!-- Table -->
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
    @foreach($username as $username)
    <tr>
    <td>
    
    </td>
    <td>
    {{$username->name}}
    </td>
    <td>
    {{$username->email}}
    </td>
    </tr>
    @endforeach
  </table>
</div>

@stop