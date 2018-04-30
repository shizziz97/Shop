  @extends('layouts.main')
@section('title','| Create Post')
@section('stylesheet')
{!! Html::style('css/select2.min.css') !!}
@stop
@section('content')
<h1 class="text-center">
    Create a post 
</h1>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
<form method="post" action="/posts" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('title') ?  ' has-error' :''}}">
            <label for="title" class="control-label">Title</label>           
            <input class="form-control" type="text" id="title" name="title" value="{{ old('title')}}" autofocus/> 
          
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
            <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="tags" class="label-control">Tag</label>
    <select class="select2-multi form-control" name="tags[]" multiple="multiple">
        @foreach($tags as $tag)
        <option value="{{$tag->id}}">{{ $tag->name }}</option>
        @endforeach
    </select>
</div>

        <div class="form-group{{ $errors->has('slug') ?  ' has-error' :''}}">
                <label for="slug" class="control-label">Slug</label>           
                <input class="form-control" type="text" id="slug" name="slug" value="{{ old('slug')}}" autofocus/> 
              
                @if($errors->has('slug'))
            <span class="help-block">
            <strong>    {{ $errors->first('slug') }} </strong>
            </span>
            @endif
            </div>


<div class="form-group">
    <label for="po_image" id="label-control">
        Photo Of Posts 
    </label>
    <input type="file" name="po_image"/>
    
</div>
    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
    <label for="body" class="control-label">Body</label>
    <textarea name="body" rows="7" class="form-control" id="body">{{old('body')}}</textarea>
@if($errors->has('body'))
<span class="help-block">
<strong> {{ $errors->first('body') }} </strong>
</span>
@endif
    </div>
    <div class="form-group">
<button class="btn btn-success btn-block btn-lg"  style="margin-top=3%" type="submit"/> create
    </div>
</form>
</div>
</div>
@endsection  
@section('script')
{!! Html::script('js/select2.min.js') !!}
<script type="text/javascript">
        $(document).ready(function() {
    $('.select2-multi').select2();
        });
</script>
@stop