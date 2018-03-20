@extends('layouts.app')

@section('content')
  <div class="container">
    @if (Session::has('success'))
      <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ Session::get('success') }}
      </div>

    @endif
    <div class="col-sm-6">
      @foreach ($categories as $category)
        <div class="card">
          <div class="card-body">
            {{ $category->name }}
          </div>
        </div>
      @endforeach
    </div>
    <div class="com-sm-6">
      <div class="well">
        <form method="post">
          {{ csrf_field() }}
          <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="name control-label">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Please enter your category Name" name="name">
            @if ($errors->has('name'))
            <small class="text-danger">{{ $errors->first('name') }}</small>
            @endif
          </div>
          <input type="submit" class="btn btn-success btn-block" value="Submit">
        </form>
      </div>
    </div>
  </div>
@endsection
