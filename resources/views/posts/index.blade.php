@extends('layouts.main')
@section('title' , '| index')
@section('content')
<div class="row">
<div class="col-md-12">
<table class="table">
 <thead>
<th>#</th>
<th>Title</th>
<th>slug</th>
<th>category</th>
<th>Body</th>
<th>Created At</th>
<th>Updated At</th>
<th>  </th>
 </thead>
 <tbody>
@foreach($posts as $post)
<tr>
<th>{{$post->id}}</th>
<td>{{$post->title}}</td>
<td>{{$post->slug}}</td>
<td>{{$post->category->name}}</td>
<td>
@if(strlen($post->body) > 20 )
{{ substr($post->body,0,10)}}<a href="{{route('posts.show' , $post->id) }}">...Read more</a>
@else 
{{ $post->body }}
@endif
</td>
<td>{{date('M D Y',strtotime($post->created_at))}}</td>
<td>{{date('M D Y' , strtotime($post->updated_at))}}</td>
<td>
<a href="{{route('posts.show',$post->id)}}" class="btn">View</a>
<a href="{{ route('posts.edit',$post->id) }}" class="btn btn-primary">Edit</a>
</td>
</tr>
@endforeach
 </tbody>
</table>
</div>
</div>

@stop