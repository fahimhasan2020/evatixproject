<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Tables</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="container">
  <h1>Users</h1>
  <!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
 Create users
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Create</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <label for="userName">User Name</label>
       <input name="user_name" id="userName" type="text" class="form-control">
       </div>
       <div class="form-group">
      <label for="userName">Email</label>
       <input name="email" id="email" type="email" class="form-control">
       </div>
       <div class="form-group">
      <label for="password">Password</label>
       <input name="password" id="password" type="password" class="form-control">
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="postUser()" class="btn btn-primary">Save </button>
      </div>
    </div>
  </div>
</div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Active</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $u)
    <tr>
      <th scope="row">{{$u->id}}</th>
      <td>{{$u->user_name}}</td>
      <td>{{$u->email}}</td>
      <td>{{$u->is_active}}</td>
      <td><button data-toggle="modal" data-target="#exampleModalUser{{$u->id}}" class="btn btn-warning m-1">Update</a><button onclick="deleteUsers({{$u->id}})" class="btn btn-danger m-1">Delete</button></td>
    </tr>
    <!-- Modal -->
<div class="modal fade" id="exampleModalUser{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <label for="userName">User Name</label>
       <input name="user_name" id="userNameU{{$u->id}}" type="text" class="form-control" value="{{$u->user_name}}">
       </div>
       <div class="form-group">
      <label for="userName">Email</label>
       <input name="email" id="emailU{{$u->id}}" type="email" class="form-control" value="{{$u->email}}">
       </div>
       <div class="form-group">
      <label for="password">Password</label>
       <input name="password" id="passwordU{{$u->id}}" type="password" class="form-control" value="12345">
       </div>
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="updateUser({{$u->id}})" class="btn btn-primary">Save </button>
      </div>
    </div>
  </div>
</div>
    @endforeach
    </tbody>
</table>
    <h1>Tasks</h1>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal2">
   Create Task
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <label for="title">Title</label>
       <input name="title" id="title" type="text" class="form-control">
       </div>
       <div class="form-group">
      <label for="startedAt">Started At</label>
       <input name="started_at" id="startedAt" type="time" class="form-control">
       </div>
       <div class="form-group">
      <label for="endAt">End At</label>
       <input name="user_name" id="endAt" type="time" class="form-control">
       </div>
       <div class="form-group">
      <label for="dated">Dated</label>
       <input name="dated" id="dated" type="date" class="form-control">
       </div>
       <div class="form-group">
      <label for="userId">User Id</label>
       <input name="user_id" id="userId" type="number" class="form-control">
       </div>
       <div class="form-group">
      <label for="description">Description</label>
       <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="createTask()" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Title</th>
      <th scope="col">Started At</th>
      <th scope="col">End At</th>
      <th scope="col">Dated</th>
      <th scope="col">Is Whole Day</th>
      <th scope="col">Is Completed</th>
      <th scope="col">Description</th>
      <th scope="col">User Id</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach($tasks as $t)
    <tr>
      <th scope="row">{{$t->id}}</th>
      <td>{{$t->title}}</td>
      <td>{{$t->started_at}}</td>
      <td>{{$t->end_at}}</td>
      <td>{{$t->dated}}</td>
      <td>{{$t->is_whole_day}}</td>
      <td>{{$t->is_completed}}</td>
      <td>{{$t->description}}</td>
      <td>{{$t->user_id}}</td>
      <td><button class="btn btn-warning m-1" data-toggle="modal" data-target="#exampleModalTask{{$t->id}}">Update</button>
      
<!-- Modal -->
<div class="modal fade" id="exampleModalTask{{$t->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <label for="title">Title</label>
       <input name="title" id="titleU{{$t->id}}" type="text" class="form-control" value="{{$t->title}}">
       </div>
       <div class="form-group">
      <label for="startedAt">Started At</label>
       <input name="started_at" id="startedAtU{{$t->id}}" type="time" class="form-control" >
       </div>
       <div class="form-group">
      <label for="endAt">End At</label>
       <input name="user_name" id="endAtU{{$t->id}}" type="time" class="form-control" >
       </div>
       <div class="form-group">
      <label for="dated">Dated</label>
       <input name="dated" id="datedU{{$t->id}}" type="date" class="form-control">
       </div>
       <div class="form-group">
      <label for="userId">User Id</label>
       <input name="user_id" id="userIdU{{$t->id}}" type="number" class="form-control" value={{$t->user_id}}>
       </div>
       <div class="form-group">
      <label for="description">Description</label>
       <textarea name="description" id="descriptionU{{$t->id}}" class="form-control" cols="30" rows="10">{{$t->description}}</textarea>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="updateTask({{$t->id}})" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
      
      
      <button onclick="deleteTask({{$t->id}})" class="btn btn-danger m-1">Delete</button></td>
    </tr>
    @endforeach
   </tbody>
</table>
  </div>
   
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
    function postUser(){
        var userName = $("#userName").val();
        var email = $("#email").val();
        var password = $("#password").val();
        axios.post('/api/newuser', {
            user_name: userName,
            email: email,
            password:password
  })
  .then(function (response) {
    console.log(response);
    location.reload();
  })
 
    }
    function createTask(){
        var title = $("#title").val();
        var startedAt = $("#startedAt").val();
        var endAt = $("#endAt").val();
        var dated = $("#dated").val();
        var userId = $("#userId").val();
        var description = $("#description").val();
        axios.post('/api/tables', {
            title: title,
            started_at: startedAt,
            end_at:endAt,
            dated:dated,
            user_id:userId,
            description:description
  })
  .then(function (response) {
    console.log(response);
    location.reload();
  })
        
    }

    function deleteUsers(id){
        axios.delete('/api/newuser/'+id)
  .then(function (response) {
    console.log(response);
    location.reload();
  })
    }
    function deleteTask(id){
        axios.delete('/api/tables/'+id)
  .then(function (response) {
    console.log(response);
    location.reload();
  })
    }
    function updateTask(id){
        var title = $("#titleU"+id).val();
        var startedAt = $("#startedAtU"+id).val();
        var endAt = $("#endAtU"+id).val();
        var dated = $("#datedU"+id).val();
        var userId = $("#userIdU"+id).val();
        var description = $("#descriptionU"+id).val();
        axios.post('/api/tables/'+id+'/putted', {
            id:id,
            title: title,
            started_at: startedAt,
            end_at:endAt,
            dated:dated,
            user_id:userId,
            description:description
  })
  .then(function (response) {
    console.log(response);
    location.reload();
  })
    }

    function updateUser(id){
        var username = $("#userNameU"+id).val();
        var email = $("#emailU"+id).val();
        var password = $("#passwordU"+id).val();
        axios.post('/api/newuser/'+id+'/putted', {
            id:id,
            user_name:username,
            email:email,
            password:password
  })
  .then(function (response) {
    console.log(response);
    location.reload();
  })
    }
    </script>
  </body>
</html>