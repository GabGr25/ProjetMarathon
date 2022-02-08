@extends('layouts.app')

@section('content')
    Détail de la serie:
    <br>
    <br>
    @if(!empty($serie))
            <div class="info-serie">
            <img src=" {{ asset($serie -> urlImage) }}"/><br>
            <div class="txt-serie">
         <h1 style="text-align : center">{{$serie -> nom}}</h1>
           <div class="ifo-genre"> <b>Genre:</b>{{$serie -> genre}}/div>
           <div class="ifo-resume"><b>résumé: </b>{{$serie -> resume}}</div>
           <div class="ifo-vo"> <b>VO:</B> {{$serie -> langue}}</div>
           <div class="ifo-sortie">  <b>Date de parution</b>{{$serie -> premiere}}</div>
           <div class="ifo-avis"> <b>Avis de la redac :</b>{{$serie -> avis}}</div>
            </div>
            </div>


            <table >
                <thead>
                    <tr>
                        <th>Saison:</th>
                        <th>N°</th>
                        <th>Nom</th>
                        <th>Image</th>
                        <th>Resume</th>
                    </tr>
                </thead>
                @foreach($episodes as $episode)
                    <tbody>
                        <tr>
                            @if(Auth::user())
                                <td><input
                                           type="button"
                                           value="Déjà vu"
                                           id="{{$episode->id}}">
                                </td>
                                @if(isset($_POST['Déjà vu']))
                                    Episode vu !!
                                @endif
                            @endif
                            <td>{{$episode->saison}}</td>
                            <td>{{$episode->numero}}</td>
                            <td>{{$episode->nom}}</td>
                            <td><img src=" {{ asset($episode -> urlImage) }}"/><br></td>
                            <td>{{$episode -> resume}}</td>
                            <td style="color: red;">{{$saison}}</td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
            <br><br>
           Commentaires :<br>
           @foreach($comments as $comments)
               <br>
                {{$comments->content}}
               @if($comments->validated != 1)
                   <span style="color: red;">
                       En attente de validation par un administrateur.
                   </span>
               @endif

               <br>
               <br>
           @endforeach

        @yield('addComment')




    @else
        <h3>Aucune série</h3>
    @endif
@endsection
