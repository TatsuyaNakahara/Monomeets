<div class="background">
@foreach ($monos as $mono)
    <?php $user =   $mono->user; ?>
    <div class="card">
        
        <div class="image-box">
                        <img class="media-object img-rounded img-responsive" src="{{ asset('storage/images/' . $mono->group_picture) }}" alt="写真を挿入">

        </div>
        
        <div class="title-box">
              {!! link_to_route('monos.monopage', $mono->title, ['id' => $mono->id]) !!}
        </div>
            
           
       
        
        <div class="panel-footer">
           　　　 @include ('mono_favorite.favorite_button', ['monos' => $monos])
           　　　  @include ('mono_want.want_button', ['user' => $user])
        </div>
        
            <div>
                {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $mono->created_at }}</span>
            </div>
            
            <div class="delete">
                 
                    @if (Auth::id() == $mono->user_id)
                    {!! Form::open(['route' => ['monos.destroy', $mono->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </li>
@endforeach
</div>
{!! $monos->render() !!}

<link href="{{ asset('css/monos.css') }}" media="all" rel="stylesheet" type="text/css" />