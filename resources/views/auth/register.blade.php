@extends('layouts.app')



@section('content')

<div id="register-page">
    <div class="text-center">
        <h1>Sign up</h1>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                
                    {!! Form::label('meetsid', 'Meetsid') !!}
                    {!! Form::text('meetsid', old('meetsid'), ['class' => 'form-control']) !!}
               
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                
                    {!! Form::label('password_confirmation', 'Confirmation') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>
                <div class='button'>
                {!! Form::submit('Sign up', ['class' => 'btn btn-default btn-block']) !!}
            {!! Form::close() !!}
                </div>
        </div>
    </div>
</div>    
 <footer>
        <div class="text-center text-muted">© 2018 YAKITOMATO</div>
    </footer>
@endsection



<link type="text/css" rel="stylesheet" href="css/register.css" />
        