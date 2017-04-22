@extends('layouts.master')

@section('title')
    Welcome
@endsection

@section('content')
    @include('layouts.nav')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h2>Welcome</h2>
                    <p class="lead">This is the welcome page ... Hello everyone !!!</p>
                    <p><a href="" class="btn btn-primary btn-lg" role="button">Popular Post</a></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
              @foreach($posts as $post)
                <div class="post">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ substr(strip_tags($post->body),0,305) }} {{ strlen(strip_tags($post->body)) > 305 ? '...' : '' }}</p>
                    <a href="{{ route('blog.single',$post->slug) }}" class="btn btn-primary">Read more</a>
                </div>
                <hr>
              @endforeach
            </div>

            <div class="col-md-3 col-md-offset-1">
                <h2>sidebar</h2>
            </div>
        </div><!--end The row-->
    </div><!--end The container-->
@endsection
