    <!-- It is never too late to be what you might have been. - George Eliot -->
        @if ($comment->deleted_at == NULL)
            <div class="border-solid border-2 ml-3 mt-3" style="margin-left: {{ $depth * 10}}px">
            <p class="">{{$comment->author->name}}</p>
            <p class="">{{$comment->content_comment}}</p>
            <p class="">{{$comment->created_at}}</p>
            {{-- <p class="">Parent ID: {{$comment->parent_id}}</p> --}}
            <button class="reply" value="{{$comment->id}}" >Odpowiedz</button>
            
            @if (auth()->user()->id == $comment->author_id)
            <form action="{{route("comments.delete", ['comment' => $comment])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Usuń</button>
            </form>
            @endif
        @else
            <div class="border-solid border-2 border-red-800" style="margin-left: {{ $depth * 10}}px">
            <p class="">{{$comment->author->name}}</p>
            <p class="">{{$comment->content_comment}}</p>
            {{-- <p class="">{{$comment->parent_id}}</p> --}}
            <p class="">{{$comment->created_at}}</p>
            <p class="text-sm opacity-25">Komentarz Został Usunięty</p>
        @endif
            </div>
    @foreach($replies as $reply)
        <x-comment :comment="$reply" :depth="$depth+1"/>
    @endforeach