@extends('layouts.main')
@section('title' ,'| Category')
@section('content')
<div class="row">
        <h1 class=text-center> Category </h1>
    <div class="col-md-8">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>name</th>
                    <th>created at</th>
                    <th>updated at</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($cats as $cat)
                    <tr>
                        <th>{{$cat->id}}</th>
                        <td>{{$cat->name}}</td>
                        <td>{{$cat->created_at}}</td>
                        <td>{{$cat->updated_at}}</td>
                        <td>
                            <form method="post" action="{{route('category.destroy',$cat->id)}}"> 
                                    <a href="{{route('category.show',$cat->id)}}" class="btn">View</a>                                                                        
                                {{method_field('DELETE')}}   
                                    {{ csrf_field() }}
                                       <input type="submit" class="btn btn-danger" value="delete"/>
                                    </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-3">
        <div class="well" style="height:190px">
            <h3 class="text-center">create a category</h3>
            <form method="post" action="{{route('category.store')}}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ?  ' has-error' :''}}">
                    <label for="name" id="name" class="label-control">Name :</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}"/>
                    @if($errors->has('name'))
                        <span class="help-block">
                            <strong> {{ $errors->first('name') }} </strong>
                        </span>
            
                        @endif
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary pull-right" value="create"/>
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
     <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{route('delete.cat')}}">
                {{csrf_field()}}
                <input type="submit" class="btn btn-danger" value="Delete All"/>
                <small>when you delete it you can not receive it .. make sure to delete</small>
            </form>
        </div>
     </div>
</div>
@stop