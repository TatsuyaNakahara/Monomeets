<ul class="media-list">
@foreach ($postings as $posting)
    <?php $user = $posting->user; ?>
    <li class="media">
        
        <div class="media-body">
            <div>
                {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $posting->created_at }}</span>
            </div>
            <div>
                <p>{!! nl2br(e($posting->saying)) !!}</p>
            </div>
            <div>
                @if (Auth::id() == $posting->user_id)
                    {!! Form::open(['route' => ['postings.destroy', $posting->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $postings->render() !!}