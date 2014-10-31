@extends('layouts.master')
@section("title")
Add New
@stop

@section("right")

<table class="table">
	<tr>
		<th>
		slno
		</th>
		<th>
		name
		</th>
	</tr>
@foreach($org as $index=>$value)
		<tr>
		<th>
		{{$index+$org->getFrom()}}
		</th>
		<th>
		<a href="{{URL::to("/")}}/org/{{$value->id}}">{{$value->name}}</a>
		</th>
	</tr>
@endforeach
</table>
{{
$org->links()
}}

@stop

@section('left')
<ul class="nav nav-pills nav-stacked">
<li class="active"><a href="{{URL::to("/")}}/org/add">Add Orgnisations</a></li>
</ul>
@stop