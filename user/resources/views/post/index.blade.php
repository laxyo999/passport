

@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
  .btn{
    margin-left: 10px;
    width: 100px;
  }
</style>

<nav class="navbar navbar-expand-sm bg-inverse">

  <!-- Links -->
  <div class="navbar-brand">Crud Operation </div>
  <ul class="nav navbar-tabs ">
    <li class="nav-item">
      <a class="nav-link btn btn-success" href="{{ route('user.index') }}">User</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link btn btn-success" href="{{ route('post.index') }}">Post</a>
    </li>
    <li class="nav-item">
      <a class="nav-link btn btn-success" href="{{ route('comment.index') }}">Comments</a>
    </li>
  </ul>
</nav>
<a class="btn btn-primary" href="{{ route('post.create') }}">Add Data</a>
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
          <td>Title</td>
          <td>Body</td>
          <td>Update</td>
          <td>Delete</td>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{$post['post_id']}}</td>
            <td>{{$post['users_id']}}</td>
            <td>{{$post['title']}}</td>
            <td>{{$post['body']}}</td>
            <td><a href="/post/{{$post->post_id}}/edit" class="btn btn-primary"><span class="fas fa-edit"></span></a></td>
                 <td>
                <a href="#" class="btn btn-danger" onclick="event.preventDefault(); if(confirm('Are you sure?')){
                  document.getElementById('delete-form-{{ $post['post_id'] }}').submit();}"><span class="fas fa-trash"></span></a>

                  <form id="delete-form-{{ $post['post_id'] }}" action="{{ route('post.destroy', $post['post_id']) }}" method="POST" style="display: none;">
                      @csrf
                      @method('delete')
                  </form>
              </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>



  <button class="btn btn-success btn-sm" id="add_post_data" type="button">Add Post</button>
<div id="postModel" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" id="post_form">
        <div class="modal-header">
           <div class="modal-title">Add Post Data</div>
           <button class="close" data-dissmis="modal" type="button">&times;</button>  
        </div>
       <div class="modal-body">
           <div class="form-group">
             {{@csrf_field()}} 
             <span id="form_output"></span>
             
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
       
      </div>
      <div class="modal-footer">
          <button type="reset" class="btn btn-danger">Reset</button>
        <input type="hidden" name="button_action" id="button_action" class="btn btn-primary"  value="Insert"/>
        <input type="submit" name="submit" id="Add" class="btn btn-primary" value="Add Data"/>
         <button type="button" class=" close btn btn-danger"  data-dissmis="modal">close</button> 
      </div>
      </form>
    </div>
  </div>
</div>
  </div>
  <script>
    $(document).ready( function(){
      $('#add_post_data').on('click', function(){
        $('#postModel').modal('show');
        //  $('#post_form')[0].reset();
        // $('#form_output').html('');
        // $('#button_action').val('insert');
        // $('#action').val('Add');
      });
       $('.close').on('click', function(){
        $('#postModel').modal('hide');
        //  $('#post_form')[0].reset();
        // $('#form_output').html('');
        // $('#button_action').val('insert');
        // $('#action').val('Add');
      });
    });
  </script>
@endsection 