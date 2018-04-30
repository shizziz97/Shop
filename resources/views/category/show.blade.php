@extends('layouts.main')
@section('title','| Show')
@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="well">
            <h3 >{{$cat->name}}</h3>
            <p> created at :<span>{{$cat->created_at}} </p>
            <p> updated at :<span>{{$cat->updated_at}} </p>
            <div class="row">
                <div class="col-md-5">
                    <a href="{{route('category.edit',$cat->id)}}" class="btn btn-primary btn-block">
                        Edit
                    </a>
                </div>
                <div class="col-md-5">
                        <form method="post" action="{{route('category.destroy',$cat->id)}}"> 
                                {{method_field('DELETE')}}   
                                {{ csrf_field() }}
                                   <input type="submit" class="btn btn-danger btn-block" value="delete"/>
                           </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop