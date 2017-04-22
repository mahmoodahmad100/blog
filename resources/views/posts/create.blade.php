@extends('layouts.master')

@section('title','Create New Post')

@section('css')
	<link rel="stylesheet" href="{{ URL::to('css/select2.min.css') }}" />
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script type="text/javascript">
  tinymce.init({
    selector: 'textarea',
		plugins: 'textcolor link code',
		menubar:false
  });
	</script>
@endsection

@section('content')

	@include('layouts.nav')

	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				@include('layouts.messages')
				<h2>Create New Post</h2>
				<hr>

				{{ Form::open(['route' => 'posts.store', 'files' => true]) }}
					{{ Form::label('title','Title:') }}
					{{ Form::text('title',null,['class' => 'form-control']) }}<br/>

					{{ Form::label('slug','url:') }}
					{{ Form::text('slug',null,['class' => 'form-control']) }}<br/>

					{{ Form::label('category_id','Category:') }}
					<select class="form-control" name="category_id" id="category_id">
						@foreach($categoryies as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select><br/>

					{{ Form::label('tags','Tags:') }}
					<select class="form-control select2" name="tags[]" id="tags" multiple="multiple">
						@foreach($tags as $tag)
							<option value="{{ $tag->id }}">{{ $tag->name }}</option>
						@endforeach
					</select><br/>

					{{ Form::label('featured_image','featured image') }}
					{{ Form::file('featured_image') }}<br/>

					{{ Form::label('body','The Post:') }}
					{{ Form::textarea('body',null,['class' => 'form-control','rows' => '10']) }}<br/>

					{{ Form::submit('Create Post',['class' => 'btn btn-success btn-block']) }}

				{{ Form::close() }}

			</div>
		</div>
	</div>

@endsection

@section('js')
<script src="{{ URL::to('js/select2.min.js') }}"></script>

<script type="text/javascript">
	$('.select2').select2();
</script>

@endsection
