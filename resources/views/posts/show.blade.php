@extends('layouts.layout')

@section('main')


    <a href="{{route('admin.posts.add')}}">Adicionar Posts</a>
      <div class="d-flex flex-wrap justify-content-around ">
        @foreach ($posts as $post)
        <div class="card mt-5" style="width: 18rem;">
        @if (url("storage/posts/{$post->image}"))
          <img style="height:250px;object-fit:cover"  class="card-img-top" src='{{url("storage/posts/{$post->image}")}}' alt="Imagem de Capa">
        @endif
         
         <div class="card-body">
           <h5 class="card-title">{{$post->title}}</h5>
           <p class="card-text">{{$post->resumo}}</p>
           <a href="#" class="btn btn-primary">Ler mais...</a>
         </div>
        </div>
        @endforeach
      </div>
      
@endsection