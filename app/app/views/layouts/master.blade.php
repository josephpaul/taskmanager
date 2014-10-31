<!DOCTYPE html>
<html>
<head>
	<title>@yield("title")</title>
	@include("includes.head_common")
</head>
<body>

@include("includes.header")

<div class="container-fluid">
<div class="col-sm-3">
	@yield('left')
</div>
<div class="col-sm-9">
	@include("includes.massages")
  @yield('right')
</div>


</body>
</html>