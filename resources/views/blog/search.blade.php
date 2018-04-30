@extends('layouts.main')
@section('title' , '| search Bar')
@section('content')
<div class="row">
{!! Form::open(['route' => 'blog.search']) !!}
{{ Form::text('search' , null ,['class'=>'form-control','placeholder' => 'Search For ... ']) }}
{{ Form::submit('search',['class'=> 'btn btn-danger']) }}
{!! Form::close() !!}


@endsection