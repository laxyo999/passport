<h1>hello</h1>
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
      <form method="post" action="{{route('post.store')}}">
        
          <div class="form-group">
             {{@csrf_field()}}

             <label for="id">User Id:</label>
            
             <select name="users_id" class="form-control">
             @foreach($user as $select)
                <option value="{{$select->user_id}}">{{$select->user_id}}</option>
             @endforeach
             </select>
             
              <label for="id">Title:</label>
              <input type="text" class="form-control" name="title"/> 
              <label for="body">Body:</label>
              <textarea class="form-control" name="body"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Insert</button>
      </form>
  </div>
</div>
@endsection