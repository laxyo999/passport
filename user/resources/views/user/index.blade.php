

<!-- index.blade.php -->

@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
  .navbar{
    margin-bottom: 50px;
  }
  .btn{
    width: 100px;
    margin-right: 10px;
  }
</style>
<div class="container">
  <div id="table">
    
  <nav class="navbar navbar-expand-sm bg-light">
       <ul class="nav navbar-nav">
        <li class="nav-item">
          <a class=" btn btn-success" href="{{ route('user.index') }}">User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-success" href="{{ route('post.index') }}">Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-success" href="{{ route('comment.index') }}">Comments</a>
        </li>
       
      </ul>
     

</nav>

<div class="uper">
 
  @if(session()->get('success'))
    <div id = "success" class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped" id="table">
    <thead>
        <tr>
          <td>ID</td>
          <td>User Name</td>
          <td>Update</td>
          <td>Delete</td>
        </tr>
    </thead>
    <tbody>
     
        @foreach($users as $user)

        <tr>
            <td>{{$user['user_id'] }}</td>
            <td>{{$user['name']}}</td>
            
               <td><a id="edit" href="#" class="btn btn-primary" ><span class="fas fa-edit"></span> </a>
              <input  class="edit" type="hidden" value="{{$user['user_id']}}">
               </td>
               <td>
                <a href="#" class="btn btn-danger" onclick="event.preventDefault(); if(confirm('Are you sure?')){
                  document.getElementById('delete-form-{{ $user['user_id'] }}').submit();}"><span class="fas fa-trash"></span></a>

                  <form id="delete-form-{{ $user['user_id'] }}" action="{{ route('user.destroy', $user['user_id']) }}" method="POST" style="display: none;">
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

        <div class="modal-header">
           <div class="modal-title">Add Data</div>
           <button class="close" data-dissmis="modal" type="button">&times;</button>  
        </div>
       <div class="modal-body">
           <div class="form-group">
             {{@csrf_field()}} 
             <span id="form_output"></span>
              <label for="name">Enter User Name:</label>
              <input type="text" class="form-control" id="user_name" name="user_name"/>
          </div>
       
      </div>
      <div class="modal-footer">
          <button type="reset" class="btn btn-danger">Reset</button>
        <input type="hidden" name="button_action" id="button_action" class="btn btn-primary"  value="Insert"/>
        <button type="button" class="btn" id="submit" >Submit</button> 
         <button type="button" class="btn btn-danger"id="close" data-dissmis="modal">close</button> 
      </div>
    </div>
  </div>
  <input class="url" type="hidden" value="{{url('/user')}}">
</div>
</div>
  </div>

<script>
  $(document).ready(function(){
    $('#add_data').on('click', function(){
      $('#studentModel').modal('show');
      $('#form_output').html('');
      $('#button_action').val('Insert');
      $('#action').val('Add');
    });
   
  
    $('#close').on('click', function(){
      $('#studentModel').modal('hide');
    });

         $('#submit').on('click',function(event){
          event.preventDefault();
           //var template_url = $('url').val();
          var user_name = $('#user_name').val();
          $.ajax(
          {
              method:'POST',
              url:"{{ route('user.store') }}",
              data:{"user_name":user_name,"_token": "{{ csrf_token() }}"},
              success: function(data){
                 location.reload();
                 $('#studentModel').modal('hide');
                 
              }
            
           });
        });
  });
</script>
@endsection



 