@extends('layouts.layout')


@section('main')
  
  <h3 class="ml-3">Adicionar Categoria</h3>
  <form class="col-md-6 mx-auto" action="{{route('admin.categories.store')}}" method="POST" enctype="multipart/form-data">
     @csrf

     <input class="form-control" type="text" name="category" placeholder="Informar Categoria">
     
  <button class="btn btn-success mt-2" type="submit">Enviar</button>
  </form>
 
@endsection