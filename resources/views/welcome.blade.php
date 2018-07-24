@extends('layouts.app')

@section('content')
    @if (Auth::check())
        @include('users.show')
    @else
        <div id="toppage">
            <div class="text-center">
                <p>Monomeets</p>
                
                
              
        </body>
    </div>

                
            <div class="button">
                    {!! link_to_route('monos.toppage', 'はじめての方へ', null, ['class' => 'btn btn-md btn-default' ]) !!}
            </div>    
                
                
                
            <div class="button">
                    {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-md btn-default' ]) !!}
            </div>
        </div>
        
        
        
        
        
        
        
    @endif
    <footer>
        <div class="text-center text-muted">© 2018 YAKITOMATO</div>
    </footer>
@endsection

<link type="text/css" rel="stylesheet" href="css/welcome.css" />