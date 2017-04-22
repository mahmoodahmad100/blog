@extends('layouts.master')

@section('title','edit The post')

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
      {!! Form::model($post,['route' => ['posts.update',$post->id],'method' => 'PUT' ,'files' => true]) !!}
			<div class="col-md-8">

  			{{ Form::label('title','Title:') }}
  			{{ Form::text('title',null,['class' => 'form-control']) }}<br/>

				{{ Form::label('slug','slug:') }}
				{{ Form::text('slug',null,['class' => 'form-control']) }}<br/>

				{{ Form::label('category_id','Category:') }}
				<select class="form-control" name="category_id" id="category_id">
					@foreach($categoryies as $category)
						<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select></br>

				{{ Form::label('tags','Tags:') }}
				<select class="form-control select2" name="tags[]" id="tags" multiple="multiple">
					@foreach($tags as $tag)
						<option value="{{ $tag->id }}">{{ $tag->name }}</option>
					@endforeach
				</select></br>

				{{ Form::label('featured_image','featured image') }}
				{{ Form::file('featured_image') }}<br/>

  			{{ Form::label('body','The Post:') }}
  			{{ Form::textarea('body',null,['class' => 'form-control','rows' => '10']) }}

			</div>

      <!--post details-->
			<div class="col-md-4">
				<div class="well">
					<div class="dl-horizontal">
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
							<a href="{{route('posts.show',$post->id)}}" class="btn btn-danger btn-block">cancel</a>
						</div>
						<div class="col-md-6">
							{!! Form::submit('Save changes',['class' => 'btn btn-success btn-block']) !!}
						</div>
					</div>
				</div>
			</div>
      {!! Form::close() !!}

		</div><!--End the row-->
	</div>
@endsection

@section('js')
<script src="{{ URL::to('js/select2.min.js') }}"></script>

<script type="text/javascript">
	$('.select2').select2();
	$('.select2').select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');
</script>

@endsection
