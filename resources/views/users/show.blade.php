@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->name }}</h3>
                </div>
                <div class="panel-body">
                    <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->meetsid, 500) }}" alt="">
                </div>
            </div>
            
            <div class="follow">
                @include('user_follow.follow_button', ['user' => $user])
            </div>
            

        </aside>
        <div class="col-xs-8">
            <ul class="nav nav-tabs">
                
                <li role="presentation" class="{{ Request::is('users/*/followings') ? 'active' : '' }}"><a href="{{ route('users.followings', ['id' => $user->id]) }}">Followings <span class="badge">{{ $count_followings }}</span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/followers') ? 'active' : '' }}"><a href="{{ route('users.followers', ['id' => $user->id]) }}">Followers <span class="badge">{{ $count_followers }}</span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/favoritings') ? 'active' : '' }}"><a href="{{ route('users.favoritings', ['id' => $user->id]) }}">Favoritings <span class="badge">{{ $count_favoritings }}</span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/wantings') ? 'active' : '' }}"><a href="{{ route('users.wantings', ['id' => $user->id]) }}">Wants <span class="badge">{{ $count_wantings }}</span></a></li>
　              <li role="presentation" class="{{ Request::is('users/*/wanters') ? 'active' : '' }}"><a href="{{ route('users.wanters', ['id' => $user->id]) }}">Requested<span class="badge">{{ $count_wanters }}</span></a></li>
                
                <button type="button" name="timeline" value="1">
                     <a href="{{ route('users.myitems', ['id' => $user->id]) }}"> {{ $user->name }}'s Monos  <span class="badge">{{ $count_monos }}</span></a></li>               
                </button>
                
                
                <button type="button" name="timeline" value="1">
                     <a href="{{ route('users.timeline', ['id' => $user->id]) }}">TimeLine</a></li>               
                </button>
            </ul>
            @if (Auth::id() == $user->id)
                  {!! Form::model($monos, ['route' => 'monos.store','method' => 'post', 'files' => true, 'enctype'=>'multipart/form-data']) !!}
                      <div class="form-group">
                          {!! Form::label('title', 'モノのお名前:') !!}
                          {!! Form::textarea('title', old('title'), ['class' => 'form-control', 'rows' => '2']) !!}
                         
                          
                          {!! Form::label('content', 'このモノとの思い出・特徴:') !!}
                          {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                          
                          
                          
                          <div class="form-group">
                          {!! Form::label('file', 'モノの画像:', ['class' => 'control-label']) !!}
                          {!! Form::file('file') !!}
                          </div>
                          {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                      </div>
                  {!! Form::close() !!}
            @endif
             
            </div>
    </div>
    
   
    @endsection
    
    <link href="{{ asset('css/show.css') }}" media="all" rel="stylesheet" type="text/css" />