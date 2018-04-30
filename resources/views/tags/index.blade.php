@extends('layouts.main')
@section('title',"| Tags")
@section('content')
<h1> Tags</h1>
<div class="row">
    <div class="col-md-8"> 
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nam</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                <tr>
                    <th>{{ $tag->id }} </th>
                    <td><a href="{{route('tags.show',$tag->id)}}">{{ $tag->name }}</a></td>
                    <td> 
                            {!! Form::open(['route'=>['tags.destroy',$tag->id] ,'method' => 'DELETE']) !!}
                            {!! Form::submit('delete',['class' => 'btn btn-danger btn-sm']) !!}
                            <a href="{{ route('tags.edit',$tag->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            
                            {!! Form::close() !!}                          </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        <div class="col-md-4">
            <div class="well">
                {!! Form::open() !!}
                {{ Form::label('name','Name :' ,['class' => 'label-control']) }}
                {{ Form::text('name',null,['class' => 'form-control']) }}
                {{ Form::submit('add',['class'=>'btn btn-primary btn-sm pull-right']) }}
                {!! Form::close() !!}
                <div class="clearfix"></div>
                
            </div>
            
        </div>
    {{--  end row  --}}
</div>
@stop