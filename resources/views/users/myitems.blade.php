@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->name }}</h3>
                </div>
                
            </div>
        </aside>
        <div class="col-xs-8">
           
            @if (count($monos) > 0)
                @include('monos.monos', ['monos' => $monos])
            @endif
        </div>
    </div>
@endsection