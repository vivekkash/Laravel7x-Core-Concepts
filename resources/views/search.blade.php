<!DOCTYPE html>
<html>
<head>
	<title>Search Post</title>
</head>
<body>
<form url="search" method="post">
@csrf
<input type="text" name="text">
<input type="submit" name="search">

</br>

@if(isset($posts))

@foreach ( $posts  as $post ) 

	<div>{{ $post->title }}</div>

@endforeach	

@endif

</form>

</body>
</html>