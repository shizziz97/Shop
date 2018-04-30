@extends('layouts.main')
@section('title','| edit Category')
@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="well">
            <h4 class="text-center">Edit Category</h4>
            <form method="post" action="{{route('category.update',$cat->id)}}">
                {{method_field('PUT')}}
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name" class="label-control" id="name">
                        Name :
                    </label>
                    <input type="text"class="form-control" name="name" value="{{$cat->name}}"/>
                </div>
                <div class="form-group">
                    <a href="{{ route('category.index') }}" class="btn btn-danger pull-right">cancel</a>
                    <input type="submit" value="update" class="btn btn-primary pull-right">
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop