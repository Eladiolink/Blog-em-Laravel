@extends('layouts.layout')


@section('main')

  <form class="col-md-6 mx-auto" action="{{route('admin.posts.update',$post->id)}}" method="POST" enctype="multipart/form-data">
     @csrf
     @method('PUT')

     <input class="form-control" type="text" value="{{$post->title}}" name="title" placeholder="Titulo do Post">
     <textarea class="form-control mt-2" name="resumo"  cols="30" rows="2" placeholder="resumo">{{$post->resumo}}</textarea>
     
     <input class="form-control mt-2" type="file"  name="image" >

     <div class="mt-2">
      <textarea class="mt-2 form-control" name="body" id="mytextarea" cols="30" rows="50"></textarea>
     </div>

     <div class="mt-2">
      Categorias: <br>
      @foreach ($categories as $category)
      <div>
        <label for=""><input type="checkbox" name="{{$loop->index}}" value="{{$category->id}}" id=""> {{$category->category}}</label>
      </div>
      @endforeach
    </div>
  <button class="btn btn-success mt-2" type="submit">Enviar</button>
  </form>
  
  <div style="display: none" id="content">
    {!! $post->body !!}
  </div>
  <script src="{{asset('node_modules/tinymce/tinymce.js')}}" referrerpolicy="origin"></script>
  <script>
    var text=document.getElementById('content').innerHTML;
    tinymce.init({
      selector: '#mytextarea',
      language:'pt_BR',
      language_url :'/js/lang/pt_BR.js',
      setup: function (editor) {
      editor.on('init', function (e) {
        editor.setContent(text);
      });
    }
    });
    
       
  </script>
@endsection