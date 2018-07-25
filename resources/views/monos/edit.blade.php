@extends('layouts.app')

@section('content')

    <h1>{{ $mono->title }} の編集ページ</h1>

    


    {!! Form::model($mono, ['route' => ['monos.update', $mono->id], 'method' => 'put']) !!}
        
        
        {!! Form::label('title', 'モノのお名前:') !!}
        {!! Form::text('title') !!}
        
        
        {!! Form::label('content', 'このモノとの思い出・特徴:') !!}
        {!! Form::text('content') !!}

        {!! Form::submit('更新') !!}

    {!! Form::close() !!}
    
    
    @if (Auth::id() == $mono->user_id)
                    {!! Form::open(['route' => ['monos.destroy', $mono->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
    @endif

@endsection

<link href="{{ asset('css/edit.css') }}" media="all" rel="stylesheet" type="text/css" />