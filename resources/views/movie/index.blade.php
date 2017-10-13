@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 panel">
                <h1>To do list</h1>
                <div>
                    <h2>Liste des films non vues</h2>
                    @foreach($moviesNotSeen as $movie)
                        <ul>
                            <li>{{$movie['movie']->id}}</li>
                            <li>{{$movie['movie']->title}}</li>
                            <li>{{$movie['movie']->release_date}}</li>
                            <li>{{$movie['movie']->overview}}</li>

                            <li>Cool</li>
                        </ul>
                        <a href="{{route('movies.show', $movie['movie']->id)}}">
                            <img src="https://image.tmdb.org/t/p/w185_and_h278_bestv2/{{$movie['movie']->poster_path}}">
                        </a>
                        <form method="POST" action="{{route('movies.update', $movie['dbMovie']->id)}}">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" value="{{$movie['movie']->id}}" name="movie_id">
                            <input type="hidden" value="1" name="seen">
                            <input type="hidden" value="{{$movie['movie']->genres[0]->id}}" name="category">
                            <button type="submit" class="btn btn-primary" value="Send">Déja vu</button>
                        </form>
                    @endforeach
                </div>
                <div>
                    <h2>Liste des films vues</h2>
                    @foreach($moviesSeen as $movie)
                        <ul>

                            <li>{{$movie["movie"]->id}}</li>
                            <li>{{$movie["movie"]->title}}</li>
                            <li>{{$movie["movie"]->release_date}}</li>
                            <li>{{$movie["movie"]->overview}}</li>
                            <li>Cool</li>

                        </ul>
                        <a href="{{route('movies.show', $movie["movie"]->id)}}">
                            <img src="https://image.tmdb.org/t/p/w185_and_h278_bestv2/{{$movie["movie"]->poster_path}}">
                        </a>

                        <form method="POST" action="{{route('movies.update', $movie["dbMovie"]->id)}}">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" value="{{$movie["movie"]->id}}" name="movie_id">
                            <input type="hidden" value="0" name="seen">
                            <input type="hidden" value="{{$movie["movie"]->genres[0]->id}}" name="category">
                            <button type="submit" class="btn btn-primary" value="Send">Ajouter à ma liste non vue</button>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection