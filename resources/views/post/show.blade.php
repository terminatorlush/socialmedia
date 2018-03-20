@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="com-sm-6 col-sm-offset-3">
      <div class="card">
        <div class="card-header">
          <h4>{{ $post->title}}</h4>
        </div>
          <div class="card-body">
            {{ $post->body}}
            <br/>
            <div class="badge">
              {{ $post->category->name}}
            </div>

            <div class="card-footer">
                  <a href="#" class="btn btn-link">Like</a>
                  <a href="#" class="btn btn-link">Dislike</a>
                  <a href="#" class="btn btn-link">Comment</a>
            </div>
            <div class="card" style="margin-top: 15px;">
              <div class="card-body">
            
              </div>
              <div>
                 @foreach ($posts->comments as $comment)
                <div class="card" style="margin: 0; border-radius: 0;">
                  <div class="card-body">
                      <div class="col-sm-9">
                          {{ $comment->comment }}
                      </div>
                      <div class="col-sm-3 text-right">
                          <small>Commented by {{ $comment->user->name }}</small>
                      </div>
                  </div>
                </div>
                @break
            @endforeach
                @if(Auth::check())
                <div class="card" style="margin: 0; border-radius: 0px;">
                  <div class="card-body">
                    <form action="{{ url('/comment') }}" method="POST"  style="display: flex;">
                       {{csrf_field()}}
                       <input type="hidden" name="user_id" value=" {{ $post->id }} ">
                      <input type="text" name="comment" placeholder="Enter your comment" class="form-control" style="border-radius: 0;">
                    <input type="submit" name="Comment" class="btn btn-primary" style="border-radius: 0;">
                    </form>
                    @if (count($errors) > 0)
                          <div class="alert alert-danger">
                              <a href="#" class="close" data-dismiss="alert">&times;</a>
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      {{ $error }}
                                  @endforeach
                              </ul>
                          </div>
                      @endif
                      @if (Session::has('success'))
                          <div class="alert alert-success">
                              <a href="#" class="close" data-dismiss="alert">&times;</a>
                              {{ Session::get('success') }}
                          </div>
                      @endif
                  </div>                  
                </div>
                @endif
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection
