@extends('layouts.layout')

@section('main')

      <div class="d-flex">
            <main class="col-9">
             <div class="d-flex justfy-content-center my-5">
               <img style="width: 100%;object-fit: cover" class="mx-auto" src="{{url("storage/posts/{$post->image}")}}" alt="Imagem de Capa">
             </div>
               <h1>{{$post->title}}</h1>
            {!! $post->body !!}
            </main>
            <article class="col-3">
              <h3 class="mt-5">Categorias:</h3>
             
              <h6></h6>
            </article>
      </div>
      
      <a class="btn btn-success" href="{{route('posts.show')}}">Voltar a página principal</a>
@endsection