@extends('layouts.app')

@section('content')





        <title>Choix série</title>
        <link rel="stylesheet" href="/style/style.css">
    </head>
    <body>

    <div class="container serie_show">
        <div class="serie_top_infos">
            <img src="http://172.31.146.100/~dut19_groupe16{{$serie->urlImage}}" class="serie_img_affiche">


            <div class="serie_infos_name">
                <div class="serie_top_genre">
                    <div class="carre_rose_genre"></div>
                    <p class="noms_genre">Genres:</p>

                    @foreach($genres as $genre)
                        <p>{{$genre->nom}}</p>
                    @endforeach
                </div>
                <div class="serie_top_infos_name">
                    <div class="carre_rose"></div>
                    <span class="serie_nom_serie">{{$serie->nom}}</span>
                    <div class="serie_checkbox">
                        <span>Vu</span>

                        <label class="serie_btn_vue" for="checkbox_seen" aria-describedby="label"></label>
                        <input type="checkbox" id="checkbox_seen">

                    </div>


                </div>
                @if(!empty($serie->urlAvis))
    <div class="playerYoutube">
        <iframe class="youtube" width="1280" height="720" src="{{$serie->urlAvis}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

    </div>
                    @endif

</div>

</div>
        <div id="saison">
            @foreach($saisons as $saison)
                <button>Saison {{$saison->saison}}</button>
                @foreach($episodes as $episode)
                    @if($saison->saison==$episode->saison)
                        @if(($episode->urlImage)==null)
                            <div id="episode">
                                <a href="{{route('episode.show',$episode->id)}}"><img src="{{url($episode->nom)}}"></a>
                            </div>

                            @else
                            <div id="episode">

                                <a href="{{route('episode.show',$episode->id)}}"><img src="{{url($episode->urlImage)}}"></a>
                                <p>Episode {{$episode->numero}}: {{$episode->nom}}</p>
                            </div>

                            @endif
                    @endif

                @endforeach
            @endforeach

        </div>

<div class="serie_mid_infos">
<div class="serie_mid_infos_synopsis">
    <div class="serie_mid_infos_name">
        <div class="carre_rose_mid"></div>
        <span class="serie_synopsis_titre">Synopsis</span>
    </div>

    <div class="serie_mid_notes">
        <p class="note"><span>Note de la communauté: </span>{{$serie->note}}</p> <!-- ICI IL FAUT METTRE LA VARIABLE DE LA MOYENNE DES NOTES DES COMMENTAIRES-->
        <p class="note"><span>Note de la rédaction: </span>{{$serie->note}}</p> <!-- ICI IL FAUT METTRE LA VARIABLE DE LA MOYENNE DES NOTES DES COMMENTAIRES-->
    </div>

    <span class="serie_synopsis_text">{!!$serie->resume!!}</span>
</div>

@if(!empty($serie->avis))

    <div class="serie_mid_infos_avis">
        <div class="serie_mid_infos_name">
            <div class="carre_rose_mid"></div>
            <span class="serie_synopsis_titre">Avis de la rédaction</span>
        </div>



        <span class="serie_synopsis_text">{{$serie->avis}}</span>
    </div>

@endif



</div> <!-- FIN MID INFO-->

<!-- Il faut mettre le choix des saisons..... -->
<hr class="serie_info">
<div class="serie_mid_infos_name">
<div class="carre_rose_mid"></div>
<span class="serie_synopsis_titre">Commentaires</span>
</div>
<div class="serie_form_commentaire">
<textarea class="textarea_serie_commentaire" placeholder="Votre commentaire sur {{$serie->nom}}"></textarea>
<div class="bottom_form_comment">
    <div><label for="note_serie">Ajouter une note</label>
     <input type="text" id="note_serie">
    </div>
    <div>
        <a href="{{route('comment.create',$serie->id)}}"><input class="btn_envoi_form_commentaire" type="submit"></a>
    </div>
</div>

</div>





@if(!$isAdmin)
<div>
@foreach($commentaires as $commentaire)
    @if(($commentaire->validated)==true)
        <p><strong>Commentaires: </strong></p>
        <p>Utilisateur: {{$commentaire->user_id}}</p>
        <p>{{$commentaire->content}}</p>
    @endif
@endforeach
</div>
@else
<div>
@foreach($commentaires as $commentaire)
    <p><strong>Commentaires: </strong></p>
    <p>Utilisateur: {{$commentaire->user_id}}</p>
    <p>{{$commentaire->content}}</p>
@endforeach
</div>
@endif







</div>




@endsection
