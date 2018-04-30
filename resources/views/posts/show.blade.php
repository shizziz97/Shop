@extends('layouts.main')
@section('title'  ,'| show blog')
@section('content')
<div class="row">
    <div class="col-md-8">
<h1> {{ $post->title }} </h1>
<p> {{ $post->body }} </p>
<p> 
    @foreach($post->tags as $tag)
<span class="label label-default">{{$tag->name}}</span>
@endforeach
</p>
</div>
<div class="col-md-4">
<div class="well">
<p> <span style="font-size:20px"> Created At : </span> {{ date('D , M , y' , strtotime( $post->created_at)) }} </p>
<p> <span style="font-size:20px"> Updated At : </span> {{date('D , M , y' , strtotime( $post->Updated)) }} </p>
<p> <span style="font-size:20px"> Slug : </span> <a href="{{ url('/blog' , $post->slug) }}" > {{$post->slug}}</a> </p>
<p> <span style="font-size:20px"> Category </span> {{$post->category->name}} </p>

</div>
<div class="row">
<div class="col-md-6">
    <a href="{{route('posts.edit' , $post->id )}}" class="btn btn-primary btn-block" >Edit</a>
{{--  end the col-md-3  --}}
</div>
<form method="post" action="{{ route('posts.destroy' , $post->id)}}" id="confirm_delete" >
<div class="col-md-6">
        {{method_field('DELETE')}}   
        {{ csrf_field() }}        
        <input class="btn btn-danger btn-block " type="submit" value="Delete" />
        
    {{--  end the col-md-3  --}}
    </div>
</form>
<div class="col-md-12">
    <a href="{{route('posts.index')}}" class="btn btn-default btn-block" style="margin-top:10px"> << See All Posts </a>
</div>
{{--  end the row  --}}
</div>
{{--  end the control  --}}
</div>
{{--  end the col-md-2  --}}
</div>
{{--  end the main row  --}}
</div>
    
    @endsection