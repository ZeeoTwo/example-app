@extends('layouts.app')

    @vite(['/resources/js/reply.js'])

@section('content')


@auth
    @if (auth()->user()->id == $post->author_id)
    <a href="{{ route('posts.edit', ['publication' => $post->id]) }}">Edytuj</a>
    <form action="{{ route('posts.delete', ['publication' => $post->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Usuń</button>
    </form>
    @endif
@endauth
<p class="text-red-700 text-center"> Tytul: {{ $post['title'] }}</p>
<p class="text-yellow-600 text-center">{{ $post['content'] }}</p>
<p class="text-emerald-600 text-left">Autor: {{ $post['author']->name }}</p>



        <div class="text-center space-y-7 mx-64 my-5">
            Komentarze: 
                </br>
                @php
                // dd($comments);
                $comments = $post->comments()->withTrashed()->get();
                //! SRAM NA TO
                function childs($parent, $childs ){
                    
                }

                $view = collect();

                foreach($comments as $comment){

                        echo ("</br>" . "ID: ". $comment->id. "Parent " . $comment->reply);
                        $childrens = $comment->child;
                        childs($comment,$comment->child);
                        //var_dump($comments->search($comment));

                        //foreach($childrens as $child){
                        //    echo($comments->search($child));
                        //}
                        //$view->push($comment);

                        //$view->push($childrens);
                        
                        //$comments = $comments->diff($comment);
                        
                }

                @endphp

                @foreach ($post->comments()->withTrashed()->get() as $comment)
                @if ($comment->deleted_at == NULL)
                    <div class="border-solid border-2">
                    <p class="">{{$comment->author->name}}</p>
                    <p class="">{{$comment->content_comment}}</p>
                    <p class="">{{$comment->created_at}}</p>
                    <p class="">{{$comment->parent_id}}</p>
                    <button class="reply" value="{{$comment->id}}" >Odpowiedz</button>
                    
                    @if (auth()->user()->id == $comment->author_id)
                    <form action="{{route("comments.delete", ['comment' => $comment])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Usuń</button>
                    </form>
                    @endif
                @else
                    <div class="border-solid border-2 border-red-800">
                    <p class="">{{$comment->author->name}}</p>
                    <p class="">{{$comment->content_comment}}</p>
                    <p class="">{{$comment->parent_id}}</p>
                    <p class="">{{$comment->created_at}}</p>
                    <p class="text-sm opacity-25">Komentarz Został Usunięty</p>
                @endif
                
                
                </div>

                @endforeach
        </div>

        {{-- ~ Formularz Komentarzy~ --}}
        @auth
            <form action="{{ route('comments.store', ['publication' => $post])}}" method="POST">
            @csrf
            <input type="hidden" id="parent" name="parent_id" value="">
            <textarea name="content_comment" placeholder="Treść Komentarza"></textarea>
            @error("content_comment") <p>{{$message}}</p>@enderror
            </br>
            <button type="submit">Dodaj Komentarz</button>
            </form>
        @endauth


@endsection
