@extends('layouts.master')

@section('title','login')

@include('layouts.nav')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        {!! Form::open() !!}

          {{ Form::label('email','Email:') }}
          {{ Form::text('email',null,['class' => 'form-control']) }}<br/>

          {{ Form::label('password','password:') }}
          {{ Form::password('password',['class' => 'form-control']) }}<br/>

          {{ Form::checkbox('remember') }} {{ Form::label('remember','remember me:') }}<br/>

          {{ Form::submit('login',['class' => 'btn btn-primary btn-block']) }}

          <p><a href="{{ url('password/reset') }}">Forgot my password</a></p>

        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection
