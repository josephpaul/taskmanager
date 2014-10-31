<center>
@if(Session::has('msg') AND Session::has('error') AND Session::get('error')==false)

<div role="alert" class="alert alert-success">
{{ Session::get('msg')}}
</div>
@elseif(Session::has('msg') AND Session::has('error') AND Session::get('error')==true)

<div role="alert" class="alert alert-danger">
{{ Session::get('msg')}}
</div>
@elseif(Session::has('msg'))
<div role="alert" class="alert alert-info">
{{ Session::get('msg')}}
</div>

@endif
</center>