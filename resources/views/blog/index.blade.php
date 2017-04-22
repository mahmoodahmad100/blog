@extends('layouts.master')

@section('title','blog')

@section('content')
  @include('layouts.nav')
  <div class="container">

    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h1>Blog</h1>
      </div>
    </div>

    <div class="row">
      @foreach($posts as $post)
      <div class="col-md-8 col-md-offset-2">
        <h2>{{ $post->title }}</h2>
        <h2>published at:{{ $post->created_at }}</h2>
        <p>{{ substr(strip_tags($post->body),0,100) }} {{ strlen(strip_tags($post->body)) > 100 ? '...' : '' }}</p>
        <a href="{{ route('blog.single',$post->slug) }}" class="btn btn-primary">read more</a>
        <hr>
      </div>
      @endforeach
    </div>

    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="text-center">{{ $posts->links() }}</div>
      </div>
    </div>

  </div>

@endsection
