<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
</head>
<body>
    <nav class="nav navbar bg-primary">
      <a class="mx-auto h4 text-white text-decoration-none link" href="{{route('posts.show')}}">Blog</a>
      
      

      @auth

      <a class="btn btn-success bg-warning mr-2" href="{{route('admin.show')}}">Gerenciamento</a>     

      <form action="{{route('logout')}}" method="POST">
        @csrf
        <button class="btn btn-danger" type="submit">Logout</button>    
      </form>  

      @else 
        <a class="btn btn-success" href="/login">Login</a>  
      @endauth
      
    </nav>
    
    <main class="container py-5">
      @yield('main')
    </main>
</body>
<script src="/js/bootstrap.js"></script>
<script src="/js/jquery.js"></script>
</html>