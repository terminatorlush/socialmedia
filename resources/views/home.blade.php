@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Dashboard</div>
          <div class="card-body">
                    @if (session('status'))
                      <div class="alert alert-success">
                        {{ session('status') }}
                      </div>
                    @endif
                    Welcome {{ Auth::user()->name}}
                    <img src="{{ Auth::user()->profile_picture }}" alt="">
                    <!-- Nav tabs -->
                    <div>
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li role="presentation" class="active">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Post</a>
                        </li>
                        <li role="presentation" class="active">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#comments" role="tab" aria-controls="comments" aria-selected="false">Comment</a>
                        </li>
                        <li role="presentation" class="active">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#categories" role="tab" aria-controls="categories" aria-selected="false">Category</a>
                        </li>
                      </ul>

                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                          {{ Auth::user()->posts()->count() }} Posts created
                          @foreach (Auth::user()->posts as $post)
                          <div class="card">
                            <div class="card-header">
                                {{ $post->title}}
                            </div>
                            <div class="card-body">
                              {{ $post->body}}
                              <div class="badge">
                              {{ $post->category->name}}
                              </div>

                            </div>
                          </div>
                          @endforeach
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="comments">
                          All the comments created by this user will show here!
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="categories">
                          {{ Auth::user()->categories()->count() }} Categoreies created
                            @foreach (Auth::user()->categories as $category)
                                <div class="card">
                                  <div class="card-body">
                                    {{ $category->name }}
                                  </div>
                                </div>
                            @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection