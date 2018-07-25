@extends('layouts.app')

@section('content')
<div id="login">
    <div class="text-center">
        <h1>Log in</h1>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('meetsid', 'Meets-Id') !!}
                    {!! Form::text('meetsid', old('meetsid'), ['class' => 'form-control']) !!}
                
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Log in', ['class' => 'btn btn-default btn-block']) !!}
                {!! Form::close() !!}

            <p>New user? {!! link_to_route('signup.get', 'Sign up now!') !!}</p>
        </div>
    </div>
</div>
 <footer>
        <div class="text-center text-muted">© 2018 YAKITOMATO</div>
    </footer>
@endsection


<link type="text/css" rel="stylesheet" href="css/login.css" />