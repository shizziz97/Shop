@extends('layouts.main')
@section('title','| Edit Post')
@section('stylesheet')
{!! Html::style('css/select2.min.css') !!}
@stop
@section('content')
<h1 class="text-center">
    Edit Your Post 
</h1>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
<form method="post" action="{{route('posts.update',$post->id)}}"  enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="form-group{{ $errors->has('title') ?  ' has-error' :''}}">
            <label for="title" class="control-label">Title</label>           
            <input class="form-control" type="text" id="title" name="title" value="{{$post->title}}" autofocus/> 
          
            @if($errors->has('title'))
        <span class="help-block">
        <strong>    {{ $errors->first('title') }} </strong>
        </span>
        @endif
        </div>

        <div class="form-group">
                <label for="category_id" class="label-control">
                    Category
                </label>
                    <select name="category_id" class="form-control">
                        @foreach($cats as $cat)
                            <option value="{{$cat->id}}" {{($cat->id == $post->category_id )? "selected" :''}}>{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags" class="label-control">
                        Tags 
                    </label>
                    <select class="select2-multi form-control" name="tags[]" multiple="multiple">
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}" >{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>

        <div class="form-group{{ $errors->has('slug') ?  ' has-error' :''}}">
                <label for="slug" class="control-label">Slug</label>           
                <input class="form-control" type="text" id="slug" name="slug" value="{{$post->slug}}" autofocus/> 
              
                @if($errors->has('slug'))
            <span class="help-block">
            <strong>    {{ $errors->first('slug') }} </strong>
            </span>
            @endif
            </div>

<div class="form-group">
    <label for="po_image" class="label-control">
        Upload Image
    </label>
    <input type="file" name="po_image" class="form-control"/>
</div>

    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
    <label for="body" class="control-label">Body</label>
    <textarea name="body" rows="7" class="form-control" id="body">{{ $post->body }}</textarea>
@if($errors->has('body'))
<span class="help-block">
<strong> {{ $errors->first('body') }} </strong>
</span>
@endif
    </div>
    <div class="form-group">
<button class="btn btn-success  btn-lg pull-right"  style="margin-top=3%" type="submit"/> Update</button>
    <a href="{{ route('posts.show',$post->id) }}" class="btn btn-danger btn-lg pull-right " >Cancel</a>
    </div>
</form>
</div>
</div>
@endsection  
@section('script')
{!! Html::script('js/select2.min.js') !!}
<script type="text/javascript">
        $(document).ready(function() {
    $('.select2-multi').select2().val(
        {!! json_encode($post->tags()->allRelatedIds()) !!}
    ).trigger('change');
        });
</script>
@stop