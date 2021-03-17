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
    </nav>
    
    <main class="container py-5">
      @yield('main')
    </main>
</body>
<script src="/js/bootstrap.js"></script>
<script src="/js/jquery.js"></script>
</html>