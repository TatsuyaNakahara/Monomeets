@extends('layouts.app')

@section('content')
    <div class="row">
        
                
            
        
        <div class="col-xs-8">
            
            <div class="chat">
                    <h3 class="chat-title">[ {{ $mono->title }} ] のChat room</h3>
                </div>
           
                  {!! Form::open(['route' => 'postings.store']) !!}
                      <div class="form-group">
                          {!! Form::label('chatmonotitle', '宛先（例：＞〇〇〇〇さん）:') !!}
                          {!! Form::textarea('chatmonotitle', old('chatmonotitle'), ['class' => 'form-control', 'rows' => '2']) !!}
                          
                          <input type="hidden" name="mono_id" value="{{$mono_id}}"/>
                          {!! Form::label('title', 'お問い合わせ内容:') !!}
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