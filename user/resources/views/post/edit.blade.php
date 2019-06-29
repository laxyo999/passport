
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
      @if(session()->get('success'))
          <div class="alert alert-success">
            {{ session()->get('success') }}  
          </div><br />
        @endif
       <div class="alert alert-success">
         
       </div>
    @endif
      <form method="post" action="{{action('postcontroller@update', $post[0]->post_id)}}">
          <div class="form-group">
              {{@csrf_field()}}
              <input type="hidden" name="_method" value="PATCH" >
             <label for="id">User Id:</label>
              <input type="text" class="form-control" name="users_id" value="{{$post[0]->users_id}}" /> 
              <label for="id">Title:</label>
              <input type="text" class="form-control" name="title" value="{{$post[0]->title}}"/> 
              <label for="body">Body:</label>
              <textarea class="form-control" name="body">{{$post[0]->body}}</textarea>
          </div>
          <button type="submit" class="btn btn-primary">Update Data</button>
      </form>
  </div>
</div>
@endsection