<div class="background">
@foreach ($monos as $mono)
    <?php $user =   $mono->user; ?>
    <div class="card">
        
        <div class="image-box">
                        <img class="media-object img-rounded img-responsive" src="{{$mono->group_picture}}" alt="写真を挿入">

        </div>
        
        <div class="title-box">
              {!! link_to_route('monos.monopage', $mono->title, ['id' => $mono->id]) !!}
        </div>
        
        
        @foreach($wanter_ids_from_mono_id[$mono->id]??array() as $u) Requested by
       {{ App\User::find($u)->name }} 
       @endforeach
        
        
        <div class="panel-footer">
           　　　 @include ('mono_favorite.favorite_button', ['monos' => $monos])
           　　　  @include ('mono_want.want_button', ['user' => $user])
           　　　  
           　　　  
              <div class="chat">
                  {!! link_to_route('users.chat', 'コンタクト！', ['id' => $mono->id]) !!}
              </div>
        </div>
            <div>
                {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!}<br> <span class="text-muted">posted at {{ $mono->created_at }}</span>
            </div>
            
            <div class="edit">
                
                {!! link_to_route('monos.edit', 'edit', ['id' => $mono->id]) !!}
                
                
                
            </div>
            
            
            
            
            
                
                
                
        
            
            
            
            
            
            
        </div>
    </li>
@endforeach
</div>
{!! $monos->render() !!}

<link href="{{ asset('css/monos.css') }}" media="all" rel="stylesheet" type="text/css" />