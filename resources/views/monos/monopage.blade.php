@extends('layouts.app')

@section('content')


<div class="background">
@foreach ($monos as $mono)
 <?php $user =   $mono->user; ?>
    <div class="card">
        
        <div class="image-box">
          <img class="media-object img-rounded img-responsive" src="$mono->group_picture" alt="写真を挿入">
        </div>
        
        <div class="title-box">
             <h2><?php echo("$mono->title");
             ?></h2>
             
        </div>
        <br>
        <p>-----------------------------------------------------</p>
        
        
        
        
        
        
        <div class="content-box">
             <h3><?php echo("$mono->content");
             ?></h3>
        
        
       
            
       <div class="show-class">        
             @if (Auth::user()->is_favoriting($mono->id))
        {!! Form::open(['route' => ['user.unfavorite', $mono->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unfavorite', ['class' => "btn btn-danger btn-block"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.favorite', $mono->id]]) !!}
            {!! Form::submit('Favorite', ['class' => "btn btn-primary btn-block"]) !!}
        {!! Form::close() !!}
    @endif
    
    <br>
   
    
           
    @if (Auth::user()->is_wanting($user->id))
        {!! Form::open(['route' => ['mono.unwant', $mono->id], 'method' => 'delete']) !!}
            {!! Form::submit('やっぱいらん♪', ['class' => "btn btn-danger btn-block"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['mono.want', $mono->id]]) !!}
            {!! Form::submit('めっちゃほしい...', ['class' => "btn btn-primary btn-block"]) !!}
        {!! Form::close() !!}
    @endif
　　</div>

       </div class="chat">
        
        {!! link_to_route('users.chat', '持ち主にコンタクトをとる', ['id' => $user->id]) !!}
        </div>
 
   
   
   
            
            
@endforeach
</div>

@endsection

<link href="{{ asset('css/monopage.css') }}" media="all" rel="stylesheet" type="text/css" />