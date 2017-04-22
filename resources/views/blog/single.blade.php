@extends('layouts.master')

@section('title',"$post->title")

@section('content')
  @include('layouts.nav')
  <div class="container">

    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h2>{{ $post->title }}</h2>
        <img src="{{ asset('images/'.$post->image) }}" alt="" />
        <p>{!! $post->body !!}</p>
        <hr>
        <p>Posted in: {{ $post->category->name }} </p>
      </div>
    </div>

    <div class="row">
  		<div class="col-md-8 col-md-offset-2">
  			<h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span>  {{ $post->comments()->count() }} Comments</h3>
  			@foreach($post->comments as $comment)
  				<div class="comment">
  					<div class="author-info">

  						<img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=mm" }}" class="author-image">
  						<div class="author-name">
  							<h4>{{ $comment->name }}</h4>
  							<p class="author-time">{{ date('F nS, Y - g:iA' ,strtotime($comment->created_at)) }}</p>
  						</div>

  					</div>

  					<div class="comment-content">
  						{{ $comment->comment }}
  					</div>

  				</div>
  			@endforeach
  		</div>
  	</div>

    <div class="row">
      <div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
        {!! Form::open(['route' => ['comments.store',$post->id], 'method' => 'post']) !!}

        <div class="row">

          <div class="col-md-6">
            {{ Form::label('name','name') }}
            {{ Form::text('name',null,['class' => 'form-control']) }}
          </div>

          <div class="col-md-6">
            {{ Form::label('email','email') }}
            {{ Form::text('email',null,['class' => 'form-control']) }}
          </div>

          <div class="col-md-12">
            {{ Form::label('comment','comment') }}
            {{ Form::textarea('comment',null,['class' => 'form-control' ,'rows' => '5']) }}<br>
            {{ Form::submit('send',['class' => 'btn btn-success btn-block']) }}
          </div>

        </div>


        {!! Form::close() !!}
      </div>
    </div>


  </div>

@endsection
