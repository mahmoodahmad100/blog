@extends('layouts.master')

@section('title',"$tag->name Tag")


@section('content')

  @include('layouts.nav')
  <div class="container">

    <div class="row">
      <div class="col-md-12">

        {{ Form::model($tag,['route' => ['tags.update',$tag->id], 'method' => 'PUT']) }}
          {{ Form::label('name','Tage:') }}
          {{ Form::text('name',null,['class' => 'form-control']) }}<br>
          {{ Form::submit('save changes',['class' => 'btn btn-success']) }}
        {{ Form::close() }}

      </div>
    </div>

  </div>

@endsection
