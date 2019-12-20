@extends('layouts.app')

@section('content')
<div class="container_white">
    <div>
        <img src="{{url($episodes->urlImage)}}">

    </div>

    <div>
        <p>Episode {{$episodes->numero}} {{$episodes->nom}}</p>
    </div>

    <div>
        <p>Saison: {{$episodes->saison}}</p>
    </div>


    <div>
        <p><strong>Resume:</strong>{!!$episodes->resume!!}</p>
    </div>

    <div>
        <p><strong>Durée:</strong>{{$episodes->langue}}</p>
    </div>


    <div>
        <p><strong>Date de sortie:</strong>{{$episodes->premiere}}</p>
    </div>

    <div>
        <input type="checkbox" name="vue" value="seen">Vue<br>
    </div>

</div>
    @endsection