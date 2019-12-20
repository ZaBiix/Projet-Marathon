@extends('layouts.app')

@section('content')



    <div class="container_user">
        <div class="photodeprofil">
            <img src="{[url($user->avatar)}}">
        </div>
        <div class="nomdelapersonne">
            <span>{{$user->name}}</span>
        </div>

        di
        Ses commmentaires :

        @foreach($comments as $comment)
            @if($comment->user_id==$user->id)
                <ul>
                <li>{{$comment->created_at}}</li>
                <li>{{$comment->note}}</li>
                <li>{{$comment->content}}</li>
                </ul>
                <br>
            @endif
        @endforeach
        <br>
        Les séries que {{$user->name}} suit :
        @if($nbSeries==0)
            Aucune.
        @else
            @foreach($series as $serie)
                <br>
                <ul>
                    <img src="{{url($serie->urlImage)}}">
                    <li>{{$serie->id}}</li>
                </ul>
            @endforeach
        @endif
        <br>
        Durée totale de vision : {{$duree}}
    </div>
@endsection
