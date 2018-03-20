@extends('layouts.app')


@section('content')
  <div class="container">
      <div class="col-sm-6 col-sm-offset-3">
        @if (Session::has('success'))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            {{ Session::get('success') }}
        </div>
        @endif
        {!! Form::model($post, ['method' => 'PUT', 'files' => true]) !!}
            <div class="card">
                <div class="card-header">
                  <div class="card-body">
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <input type="text" name="title" class="form-control" placeholder="Enter your post Title" id="title">
                        @if($errors->has('title'))
                            <small class="text-danger">{{$errors->first('title')}} </small>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                        <textarea name="body" rows="8" cols="80" class="form-control"  placeholder="Post your Problem and We Solve it!" id="body"></textarea>
                        @if($errors->has('body'))
                            <small class="text-danger">{{$errors->first('body')}} </small>
                        @endif
                    </div>
                    <div class="form-group">
                          <select class="form-control" name="category">
                              @foreach ($categories as $category)
                                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                              @endforeach
                          </select>
                        </div>
                        <input type="submit" value="Post" class="btn btn-primary btn-block">
                </div>
            </div>
      </div>
      {!! Form::close() !!}
  </div>
@endsection
