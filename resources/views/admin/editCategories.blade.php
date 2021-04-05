@extends('layouts.layout')


@section('main')
  
  <h3 class="ml-3">Adicionar Categoria</h3>
  <form class="col-md-6 mx-auto" action="{{route('admin.category.update',$category->id)}}" method="POST">
     @csrf
     @method('PUT')
     <input class="form-control" type="text" value='{{$category->category}}' name="category" placeholder="Informar Categoria">
     
  <button class="btn btn-success mt-2" type="submit">Enviar</button>
  </form>

@endsection