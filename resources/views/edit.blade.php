@extends('layout/main')

@section('title', 'Edit Artikel')

  <!-- Page Header -->
@section('header')
  <header class="masthead" style="background-image: url('img/contact-bg.jpg'); background-color:deeppink;">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h2>Filosofi Milenial</h2>
            <span class="subheading"></span>
          </div>
        </div>
      </div>
    </div>
  </header>
@endsection('header')

  <!-- Main Content -->
@section('container')
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <h4>Ubah Data Artikel</h4>
        <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
        <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
        <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
        <form action="{{route('artikel.update', $id)}}" method="POST">
          @method('PUT')
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Judul</label>
            <input name="title" type="text" class="form-control" placeholder="Judul" id="title" required data-validation-required-message="Masukkan Judul Artikel" value="{{$artikel->title}}">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Penulis</label>
              <input name="author" type="text" class="form-control" placeholder="Penulis" id="author" required data-validation-required-message="Masukkan Penulis Artikel" value="{{$artikel->author}}">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Deskripsi</label>
            <textarea name="content" rows="5" class="form-control" placeholder="Deskripsi Artikel" id="content" required data-validation-required-message="Masukkan Deskripsi Artikel">{{$artikel->content}}</textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <nav class="navbar navbar-light bg-light">
                <input class="btn btn-outline-success" type="submit" value="Ubah Artikel">
              <form class="form-inline">
                <a href="/artikel">
                <button class="btn btn-sm btn-outline-secondary" type="button" href="/artikel">Kembali</button>
              </form>
            </nav>
          </div>
        </form>
      </div>
    </div>
  </div>
  <hr>
@endsection('container')
