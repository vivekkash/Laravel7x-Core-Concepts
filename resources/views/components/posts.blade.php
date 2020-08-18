<div {{ $attributes->merge(['class'=>'text']) }}>
	<h4>{{ $title }} {{ $data ?? '' }}</h4>
    <!-- The only way to do great work is to love what you do. - Steve Jobs -->
    <ul>
    @foreach($posts as $post)
    	<li>
    		<small>{{$post->title}}</small></br>
    		<span>{{$post->post}}</span>
    	</li>	
    @endforeach
	</ul>
    {{$slot}}
</div>