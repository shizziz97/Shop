@extends('layouts.main')
@section('title',"| $tag->name ")
@section('content')
<div class="row">
<h1>{{ $tag->name }}
    <small>{{$tag->posts()->count()}} Posts</small>
</h1>
<div class="col-md-8">
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>title</th>
            <th>tags</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($tag->posts as $post)
            <tr>
                <th>{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>
        @foreach($post->tags as $tag)
        @if($name == $tag->name)
                <span class="label label-success">{{$tag->name}}</span>
               @else
               <span class="label label-default">{{$tag->name}}</span>               
               @endif
                @endforeach
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
<div class="col-md-4">
    <div class="row">
        <div class="col-md-6">
<a href="{{route('tags.edit',$tag->id)}}" class="btn btn-block btn-sm btn-primary float-left">Edit</a>
        </div>
        <div class="col-md-6">
{!! Form::open(['route'=>['tags.destroy',$tag->id] ,'method' => 'DELETE']) !!}
{!! Form::submit('delete',['class' => 'btn btn-block btn-danger btn-sm float-right']) !!}
{!! Form::close() !!}
        </div>
    </div>
</div>
</div>
@stop