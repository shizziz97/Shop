@extends('layouts.main')
@section('title' ,"| $post->slug")
@section('content')
<div class="row">
<div class="col-md-6 col-md-offset-3">
<div class="panel panel-default">
<div class="panel-heading">
<h3>{{ $post->title }} </h3>
</div>
<div class="panel-body">
<p>{{$post->body}}</p>
<div class="img-responsive">
        <img src="{{ asset('images/'.$post->image) }}" height="400" width="400"/>
</div>
<a href="{{ url('/blog', $post->slug) }}" class="btn btn-primary pull-right"> Copy Link </a>
</div>
</div>
</div>
</div>
@endsection