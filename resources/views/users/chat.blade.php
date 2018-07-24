@extends('layouts.app')

@section('content')
    <div class="row">
        
                
            
        
        <div class="col-xs-8">
            
           
                  {!! Form::open(['route' => 'postings.store']) !!}
                      <div class="form-group">
                          {!! Form::label('chatmonotitle', '欲しいモノのお名前:') !!}
                          {!! Form::textarea('chatmonotitle', old('chatmonotitle'), ['class' => 'form-control', 'rows' => '2']) !!}
                          
                          <input type="hidden" name="mono_id" value="{{$mono_id}}"/>
                          {!! Form::label('title', 'お問い合わせ内容（返信の際は宛先を忘れずに！ 例：＞〇〇〇〇さん）:') !!}
                          {!! Form::textarea('saying', old('saying'), ['class' => 'form-control', 'rows' => '2']) !!}
                          {!! Form::submit('Post', ['class' => 'btn btn-success btn-block']) !!}
                      </div>
                  {!! Form::close() !!}
           
            @if (count($postings) > 0)
                @include('postings.postings', ['postings' => $postings])
            @endif
            
        </div>
    </div>
@endsection