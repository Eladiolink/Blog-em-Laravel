@extends('layouts.layout')

@section('main')

      <div class="d-flex justfy-content-center my-5">
            <img style="width: 100%;object-fit: cover" class="mx-auto" src="{{url("storage/posts/{$post->image}")}}" alt="Imagem de Capa">
      </div>
      
      <h1>{{$post->title}}</h1>
      
      {!! $post->body !!}
@endsection