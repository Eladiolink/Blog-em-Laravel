@extends('layouts.layout')


@section('main')
    
  <form class="col-md-6 mx-auto" action="">
     <input class="form-control" type="text" name="title" placeholder="Titulo do Post">
     <textarea class="form-control mt-2" name="resumo"  cols="30" rows="2" placeholder="resumo"></textarea>

     <textarea class="mt-2 form-control" name="" id="mytextarea" cols="30" rows="10"></textarea>
  </form>


  <script src="{{asset('node_modules/tinymce/tinymce.js')}}" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: '#mytextarea',
      language:'pt_BR',
      language_url :'/js/lang/pt_BR.js'
     

    });
  </script>
@endsection