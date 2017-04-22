@extends('layouts.master')

@section('title',"$tag->name Tag")


@section('content')

  @include('layouts.nav')
  <div class="container">

    <div class="row">
      <div class="col-md-8">
        <h2>{{ $tag->name }} <small>{{ $tag->posts()->count() }} posts</small></h2>
      </div>

      <div class="col-md-2">
        <a href="{{ route('tags.edit',$tag->id) }}" class="btn btn-primary btn-block" style="margin-top:20px;">edit the tag</a>
      </div>
      <div class="col-md-2">
        {{ Form::open(['route' => ['tags.destroy',$tag->id], 'method' => 'DELETE']) }}
        {{ Form::submit('Delete',['class' => 'btn btn-danger btn-block' , 'style' => 'margin-top:20px']) }}
        {{ Form::close() }}
      </div>

    </div>

    <div class="row">
      <div class="col-md-12">
        <h2>The Posts with That tag</h2>
        <table class="table">

          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Tags</th>
            </tr>
          </thead>

          <tbody>
            @foreach($tag->posts as $post)
              <tr>
                <th>{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>
                  @foreach($post->tags as $tags)
                    <span class="label label-default">{{ $tags->name }}</span>
                  @endforeach
                </td>
                <td><a href="{{ route('posts.show',$post->id) }}" class="btn btn-default btn-xs">view</a></td>
              </tr>
            @endforeach
          </tbody>

        </table>
      </div><!--end col-md-12-->
    </div>
  </div>

@endsection
