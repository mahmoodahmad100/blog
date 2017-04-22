@extends('layouts.master')

@section('title','All Tags')


@section('content')

  @include('layouts.nav')
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h2>Tags</h2>
        <table class="table">

          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
            </tr>
          </thead>

          <tbody>
            @foreach($tags as $tag)
              <tr>
                <th>{{ $tag->id }}</th>
                <td><a href="{{ route('tags.show',$tag->id) }}">{{ $tag->name }}</a></td>
              </tr>
            @endforeach
          </tbody>

        </table>
      </div><!--end col-md-8-->
      <div class="col-md-4">
        <div class="well">
          <h2>New Tag</h2>
          {!! Form::open(['route' => 'tags.store' ,'method' => 'post']) !!}

          {!! Form::label('name','Name') !!}
          {!! Form::text('name', null, ['class' => 'form-control']) !!}<br/>
          {!! Form::submit('Add new tag',['class' => 'btn btn-primary btn-block']) !!}

          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>

@endsection
