@extends('layouts.master')

@section('title','See The post')


@section('content')

	@include('layouts.nav')
	<div class="container">
		<div class="row">

			<div class="col-md-8">
				<img src="{{ asset('images/'.$post->image) }}" alt="no image" />
				<h1>{{ $post->title }}</h1>

				<p class="lead">{!! $post->body !!}</p>

				<hr>

				<div class="tags">
					@foreach ($post->tags as $tag)
						<span class="label label-default">{{ $tag->name }}</span>
					@endforeach
				</div>

				<div id="backend-comments" style="margin-top: 50px;">
					<h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>

					<table class="table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Comment</th>
								<th width="70px"></th>
							</tr>
						</thead>

						<tbody>
							@foreach ($post->comments as $comment)
							<tr>
								<td>{{ $comment->name }}</td>
								<td>{{ $comment->email }}</td>
								<td>{{ $comment->comment }}</td>
								<td>
									<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
									<a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>

			<div class="col-md-4">
				<div class="well">
					<div class="dl-horizontal">
					<dl>
						<dt>url:</dt>
						<dd><a href="{{ route('blog.single',$post->slug) }}">{{ $post->slug }}</a></dd>
					</dl>

					<dl>
						<dt>Created at:</dt>
						<dd>{{ $post->created_at->diffforhumans() }}</dd>
					</dl>

					<dl>
						<dt>Updated at:</dt>
						<dd>{{ $post->updated_at->diffforhumans() }}</dd>
					</dl>

					<dl>
						<dt>Category:</dt>
						<dd>{{ $post->Category->name }}</dd>
					</dl>

					</div>
					<div class="row">
						<div class="col-md-6">
							<a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary btn-block">edit</a>
						</div>
						<div class="col-md-6">
							{!! Form::open(['route' => ['posts.destroy',$post->id], 'method' => 'DELETE']) !!}
							{!! Form::submit('delete',['class' => 'btn btn-danger btn-block']) !!}<br/>
							{!! Form::close() !!}
						</div>
						<div class="col-md-12">
							<a href="{{ route('posts.index') }}" class="btn btn-default btn-block">see all the posts</a>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
@endsection
