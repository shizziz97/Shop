@extends('layouts.main')
@section('title','| Edit')
@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Tag
            </div>
            <div class="panel-body">
                {!! Form::open(['route'=>['tags.update',$tag->id],'method'=>'PUT']) !!}
                <div class="form-group">
                {{ Form::text('name',$tag->name,['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                {{ Form::submit('update',['class'=>'btn btn-success pull-right']) }}
                <a href="{{route('tags.index')}}" class="btn btn-danger pull-right">cancel</a>                
                </div>
                {!! Form::close() !!}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@stop