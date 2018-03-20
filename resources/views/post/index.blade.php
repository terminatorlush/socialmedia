@extends('layouts.app');

@section('content')
<div class="container">
  <div class="row justify-content-center">
    @if (Session::has('success'))
    <div class="alert alert-success">
      <a href="#" class="close" data-dismiss="alert">&times;</a>
      {{ Session::get('success') }}
    </div>
    @endif
    <form method="POST">
    {{ csrf_field() }}
    <div class="card" style="border-radius: 10px;">
      <div class="card-header">
        <div class="card-body">
          <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }} ">
                <input type="text" name="title" class="form-control" placeholder="Enter your post Title">
                @if($errors->has('title'))
                <small class="text-danger"> {{$errors->first('title')}} </small>
                @endif
              </div>
            <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
              <textarea name="body" rows="8" cols="80" class="form-control"  placeholder="Post your Problem and We Solve it!"></textarea>
              @if($errors->has('body'))
              <small class="text-danger">{{$errors->first('body')}} </small>
              @endif
            </div>
          <input type="submit" value="Post" class="btn btn-primary btn-block">
        </div>
      </div>
    </div>
  </div> 
</form>


@foreach ($posts as $post)
  <div class="tab-group" style="margin-top: 10px;">
    <div class="card" style="border-radius: 15px;">
      <div class="card-header">Posted by: <b>{{ $post->user->name }}</b><h4>{{ $post->title }}</h4>
                                <div class="pull-top">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                      <li><a class="dropdown-item" href="{{ route('post.show', [$post->id]) }}">Show Post</a></li>
                                      <li><a class="dropdown-item" href="{{ route('post.edit', [$post->id]) }}">Edit Post</a></li>
                                      <li><a  class="dropdown-item" href="#" onclick="document.getElementById('delete').submit()">Delete Post</a>
                                        {!! Form::open(['method' => 'DELETE', 'id' => 'delete', 'route' => ['post.delete', $post->id ]]) !!}
                                        {!! Form::close() !!}
                                      </li>
                                    </ul>
                                </div>
                              <div class="card-body">
                                {{ $post->body }}
                                <div class="badge">
                                  {{ $post->category->name}}
                                </div>
                              </div>
        <div class="card-footer">
          <button class="btn btn-success"><span class="fa-thumbs-o-up"></span>Like</button>
          <button class="btn btn-danger"><span class=" fa-thumbs-o-down"></span>Dislike</button>
          <input type="text" class="form-control" placeholder="Comment here!" style="border-radius: 15px;"><button class=" btn btn-primary" style="display: flex;">Send</button>
        </div>
      </div>
    </div>
  </div>
@endforeach
@endsection
