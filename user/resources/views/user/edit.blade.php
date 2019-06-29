
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
      <form method="post" action="{{action('usercontroller@update', $users[0]->user_id)}}">
          <div class="form-group">
              {{@csrf_field()}}
              <input type="hidden" name="_method" value="PATCH" >
              <label for="name">Enter User Name:</label>
              <input type="text" class="form-control" name="name" value="{{$users[0]->name}}" />
          </div>
          <button type="submit" class="btn btn-primary">Update Data</button>
      </form>
  </div>
</div>
@endsection