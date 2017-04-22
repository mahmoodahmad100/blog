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
            @if(session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
            @endif
            {!! Form::open(['url' => 'password/email']) !!}

            {{ Form::label('email','your email:') }}
            {{ Form::text('email',null,['class' => 'form-control']) }}<br/>

            {{ Form::submit('reset password',['class' => 'btn btn-primary btn-block']) }}

            {!! Form::close() !!}
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
