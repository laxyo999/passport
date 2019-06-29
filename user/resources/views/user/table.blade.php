
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
