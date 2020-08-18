@extends('layouts.main')

@section('title')
Contact
@endsection

@section('styles')
<style type="text/css">
	.box{

		background-color: #ddd;
	}
	.text{

		color: blue;
	}	

</style>
@endsection

@section('content')

<x-posts title="Post" :data="$data" class="box" >
	<span>This is the end of all the post</span>
</x-posts>

@endsection


@section('scripts')
<script type="text/javascript">
	
	console.log('This is a home page');

</script>
@endsection