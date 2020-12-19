@extends('layout/main')

@section('title','Artikel')

  <!-- Page Header -->
  @section('header')
  <header class="masthead" style="background-image: url('img/home-bg.jpg'); background-color:deeppink;">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8 mx-auto">
          <div class="site-heading">
            <h1>Filosofi Milenial</h1>
            <h5>Filosofi adalah kata serapan dari bahasa Inggris yaitu philosophy. Sedangkan kata philosophy itu sendiri adalah kata serapan dari bahasa Yunani.</h5>
            <p>Dibawah Ini Adalah Contoh Filosofi Yang Bisa Mengubah Hidupmu</p>
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
        <div class="clearfix">
          <a class="btn btn-dark mb-4" href="artikel/create"  style="margin-left: 30%">Tambahkan Artikel</a>
        </div>
        <hr>
        @php $no = count($data)-1; @endphp
        @foreach ($data as $artikel)
        <div class="post-preview mt-5">
        <h3 class="post-subtitle">{{$artikel->title}}</h3>
        <p>{{substr($artikel->content, 0,200)}}</p>
          <div class="clearfix mt-2">
          <a class="float-right mb-3 mt-4" href="{{route('artikel.show', $no )}}" style="font-size: 12pt">Baca Selengkapnya</a>
        </div>
        <div class="card-footer text-muted">
          Published {{$artikel->datetime}} by {{$artikel->author}}
        </div>
      </div>
      <hr>
      @php $no = $no - 1;   @endphp
      @endforeach
      </div>
    </div>
  </div>
      <hr>
@endsection('container')
