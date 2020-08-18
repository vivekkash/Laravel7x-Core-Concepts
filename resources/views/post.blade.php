<!DOCTYPE html>
<html>
<head>
	<title>Post</title>
</head>
<body>
@if(session()->has('success'))

	<small>
		{{session()->get('success')}}
	</small>
@endif
<form url="post" method="post">
@csrf
Title: <input type="text" name="title" /></br>
Post : <input type="text" name="post" /></br>
<input type="submit" name="ok" />


@if(!$errors->isEmpty())
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
@endif	
</body>
</html>