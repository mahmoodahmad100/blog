@extends('layouts.master')

@section('title')
    Contact Us
@endsection

@section('content')
    @include('layouts.nav')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <form action="{{ route('postcontact') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email" class="control-label">The email:</label>
                        <input type="text" name="email" class="form-control" id="email">
                    </div>

                    <div class="form-group">
                        <label for="subject" class="control-label">The subject:</label>
                        <input type="text" name="subject" class="form-control" id="subject">
                    </div>

                    <div class="form-group">
                        <label for="message" class="control-label">The message:</label>
                        <textarea rows="10" name="message" class="form-control" id="message"></textarea>
                    </div>

                    <input type="submit" class="btn btn-success" value="Send The message">
                </form>

            </div>
        </div>
    </div>

@endsection
