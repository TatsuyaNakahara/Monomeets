@extends('layouts.app')

@section('saying')
    <div class="row">
        <aside class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->name }}</h3>
                </div>
                
            </div>
        </aside>
        <div class="col-xs-8">
            
            @if (Auth::id() == $user->id)
                  {!! Form::open(['route' => 'postings.store']) !!}
                      <div class="form-group">
                          {!! Form::textarea('saying', old('saying'), ['class' => 'form-control', 'rows' => '2']) !!}
                          {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                      </div>
                  {!! Form::close() !!}
            @endif
            @if (count($postings) > 0)
                @include('postings.postings', ['postings' => $postings])
            @endif
        </div>
    </div>
@endsection