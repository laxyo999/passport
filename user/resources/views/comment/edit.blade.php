
@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Users Entry
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{action('commentcontroller@update', $comment[0]->comment_id)}}">
          <div class="form-group">
              {{@csrf_field()}}
              <input type="hidden" name="_method" value="PATCH" >
             <label for="id">User Id:</label>
              <input type="text" class="form-control" name="users_id" value="{{$comment[0]->users_id}}" /> 
              <label for="id">Posts Id:</label>
              <input type="text" class="form-control" name="posts_id" value="{{$comment[0]->posts_id}}"/> 
              <label for="body">Body:</label>
              <textarea class="form-control" name="body">{{$comment[0]->body}}</textarea>
          </div>
          <button type="submit" class="btn btn-primary">Update Data</button>
      </form>
  </div>
</div>
@endsection