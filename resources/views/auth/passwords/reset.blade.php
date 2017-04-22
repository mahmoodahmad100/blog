@extends('layouts.master')

@section('title','resest password')


@section('content')
  @include('layouts.nav')
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-heading">Reset Password</div>
          <div class="panel-body">
            {!! Form::open(['url' => 'password/reset']) !!}

            {{ Form::hidden('token',$token) }}

            {{ Form::label('email','your email:') }}
            {{ Form::text('email',$email,['class' => 'form-control']) }}<br/>

            {{ Form::label('password','your password:') }}
            {{ Form::password('password',['class' => 'form-control']) }}<br/>

            {{ Form::label('password_confirmation','Confirm your password:') }}
            {{ Form::password('password_confirmation',['class' => 'form-control']) }}<br/>

            {{ Form::submit('reset password',['class' => 'btn btn-primary btn-block']) }}

            {!! Form::close() !!}
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
