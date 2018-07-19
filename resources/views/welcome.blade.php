@extends('layouts.app')

@section('content')
    @if (Auth::check())
        @include('users.show')
    @else
        <div id="toppage">
            <div class="text-center">
                <p>Monomeets</p>
            <div class="button">
                    {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-md btn-default' ]) !!}
            </div>
        </div>
    @endif
@endsection

<link type="text/css" rel="stylesheet" href="css/welcome.css" />