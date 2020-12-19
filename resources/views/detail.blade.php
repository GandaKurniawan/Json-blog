@extends('layout/main')

@section('title',$artikel->title)

  <!-- Page Header -->
  @section('header')
  <header class="masthead" style="background-image: url('img/home-bg.jpg'); background-color:deeppink;">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h2>Filosofi Milenial</h2>
            <span class="subheading">Detail Artikel</span>
          </div>
        </div>
      </div>
    </div>
  </header>
@endsection('header')

  <!-- Pager -->


  <!-- Main Content -->
@section('container')
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-preview mt-5">
        <h3 class="post-subtitle">{{$artikel->title}}</h3>
        <p>{{$artikel->content}}</p>
        <p class="text-muted">{{$artikel->datetime}} by {{$artikel->author}}</p>
      </div>
      <div class="card-footer">
        <a href="{{route('artikel.edit', $id)}}" class="btn btn-outline-primary">Ubah</a>
        <input type="submit" form="formDelete" class="btn btn-outline-danger" value="Hapus">
        <div class="float-right">
            <a href="{{route('artikel.index')}}" class="btn btn-outline-dark">Kembali</a>
        </div>
      
      </div>
      <hr>
      </div>
    </div>
  </div>
<hr>
<form action="{{route('artikel.destroy', $id)}}" id="formDelete" method="POST">
    @method('DELETE')
    @csrf
</form>
@endsection('container')
