<!DOCTYPE html>
<html>
<head>
	<title>task</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>
	@yield('content')

<nav class="navbar navbar-expand-sm bg-light">

  <!-- Links -->
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
</body>
</html>