@extends('layouts.main')
@section('title' , '| Welcom')
@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="jumbotron">
            <h1>Welcome to My Blog!</h1>
            <p class="lead">Thank you so much for visiting. This is my test website built with Laravel. Please read my popular post!</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
          </div>
        </div>
      </div>
      <!-- end of header .row -->
      <div class="row">
      @foreach($posts as $post)
        <div class="col-md-8">
          <div class="post">
            <h3>{{$post->title}}</h3>
            <p>
              @if(strlen($post->body) > 10)
                 {{ substr($post->body , 0 , 8) . '...' }} 
            </p><a href="{{route('posts.show',$post->id)}}" class="btn btn-primary">Read More </a>
              @else 
                {{ $post->body }}</p>
              @endif
        
          </div>
          <hr>
        </div>
@endforeach


        <div class="col-md-3 col-md-offset-1">
          <h2>Sidebar</h2>
        </div>
      </div>
@endsection