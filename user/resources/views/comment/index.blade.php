

@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
  .navbar{
    margin-bottom: 50px;
  }
</style>

<nav class="navbar navbar-expand-sm bg-light">

  <!-- Links -->
  <div class="navbar-brand">Crud Operation</div>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('user.index') }}">User</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('post.index') }}">Post</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('comment.index') }}">Comments</a>
    </li>
  </ul>
</nav>
<a class="btn btn-primary" href="{{ route('comment.create') }}">Add Data</a>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>User id</td>
          <td>Post Id</td>
          <td>Body</td>
          <td>Update</td>
          <td>Delete</td>
        </tr>
    </thead>
    <tbody>
        @foreach($comments as $post)
        <tr>
            <td>{{$post['comment_id']}}</td>
            <td>{{$post['users_id']}}</td>
            <td>{{$post['posts_id']}}</td>
            <td>{{$post['body']}}</td>
            <td><a href="/comment/{{$post->comment_id}}/edit" class="btn btn-primary"><span class="fas fa-edit"></span></a></td>
                <td>
                <a href="#" class="btn btn-danger" onclick="event.preventDefault(); if(confirm('Are you sure?')){
                  document.getElementById('delete-form-{{ $post['comment_id'] }}').submit();}"><span class="fas fa-trash"></span></a>

                  <form id="delete-form-{{ $post['comment_id'] }}" action="{{ route('comment.destroy', $post['comment_id']) }}" method="POST" style="display: none;">
                      @csrf
                      @method('delete')
                  </form>
              </td>

        </tr>
        @endforeach
    </tbody>
  </table>
<div>
  <button class="btn btn-success btn-sm" id="add_data" type="button">Add</button>
<div id="studentModel" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" id="student_form">
        <div class="modal-header">
           <div class="modal-title">Add Data</div>
           <button class="close" data-dissmis="modal" type="button">&times;</button>  
        </div>
       <div class="modal-body">
           <div class="form-group">
             {{@csrf_field()}} 
             <span id="form_output"></span>
               <label for="id">User Id:</label>
            
             <select name="users_id" class="form-control">
             @foreach($comment as $select)
                <option value="{{$select->users_id}}">{{$select->users_id}}</option>
             @endforeach
             </select>
             <label for="id">Post Id:</label>
            
             <select name="posts_id" class="form-control">
             @foreach($comment as $select)
                <option value="{{$select->post_id}}">{{$select->post_id}}</option>
             @endforeach
             </select>
              <label for="body">Body:</label>
              <textarea class="form-control" name="body"></textarea>
          </div>
       
      </div>
      <div class="modal-footer">
          <button type="reset" class="btn btn-danger">Reset</button>
        <input type="hidden" name="button_action" id="button_action" class="btn btn-primary"  value="Insert"/>
        <input type="submit" name="submit" id="Add" class="btn btn-primary" value="Add Data"/>
         <button type="button" class="btn btn-danger"id="close" data-dissmis="modal">close</button> 
      </div>
      </form>
    </div>
  </div>
</div>
<script>
    $(document).on('click','#add_data', function(){
       $('#studentModel').modal('show');  
    });
  
</script>
@endsection