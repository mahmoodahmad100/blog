@extends('layouts.master')

@section('title','register')

@include('layouts.nav')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        {!! Form::open() !!}

          {{ Form::label('name','Name:') }}
          {{ Form::text('name',null,['class' => 'form-control']) }}<br/>

          {{ Form::label('email','Email:') }}
          {{ Form::text('email',null,['class' => 'form-control']) }}<br/>

          {{ Form::label('password','password:') }}
          {{ Form::password('password',['class' => 'form-control']) }}<br/>

          {{ Form::label('password_confirmation','Confirm password:') }}
          {{ Form::password('password_confirmation',['class' => 'form-control']) }}<br/>

          {{ Form::submit('register',['class' => 'btn btn-primary btn-block']) }}


        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection
