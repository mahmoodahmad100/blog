@extends('layouts.master')

@section('title','All posts')


@section('content')

	@include('layouts.nav')
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<h2>All The posts</h2>
			</div>
			<div class="col-md-2">
				<a href="{{ route('posts.create') }}" class="btn btn-primary">Create new Post</a>
			</div>

			<div class="col-md-12"><hr></div>

			<div class="col-md-12">
				<table class="table">

					<thead>
						<th>#</th>
						<th>Title</th>
						<th>Body</th>
						<th>Created at</th>
						<th></th>
					</thead>

					<tbody>
						@foreach($posts as $post)
							<tr>
								<th>{{ $post->id }}</th>
								<td>{{ $post->title }}</td>
								<td>{{ substr(strip_tags($post->body),0,30) }} {{ strlen(strip_tags($post->body)) > 30 ? '...' : '' }}</td>
								<td>{{ $post->created_at }}</td>
								<td>
								<a href="{{ route('posts.show',$post->id) }}" class="btn btn-default">view</a> <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-default">edit</a>
								</td>
							</tr>
						@endforeach
					</tbody>

				</table>
				<div class="text-center">
						{!! $posts->links() !!}
				</div>
			</div>

		</div>
	</div>
@endsection
