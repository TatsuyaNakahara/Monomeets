@extends('layouts.app')

@section('content')
    <div class="row">
        
                
            
        
        <div class="col-xs-8">
            
           
                  {!! Form::open(['route' => 'postings.store']) !!}
                      <div class="form-group">
                          <input type="hidden" name="mono_id" value="{{$mono_id}}"/>
                          {!! Form::textarea('saying', old('saying'), ['class' => 'form-control', 'rows' => '2']) !!}
                          {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                      </div>
                  {!! Form::close() !!}
           
            @if (count($postings) > 0)
                @include('postings.postings', ['postings' => $postings])
            @endif
            
        </div>
    </div>
@endsection