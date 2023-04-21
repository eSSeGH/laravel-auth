@extends('layouts.app')

@section('content')
<main>

<div class="container">

    <div class="card mx-auto mt-5">
        <div class="card-body">
            <h3 class="card-title">{{$project['title']}}</h5>
            <h4 class="card-text">Descrizione: 
                <p style="font-size: 0.8rem;">{{ $project['description']}}</p>
            </h4>
            <h4 class="card-text">Prezzo: 
                <span style="font-size: 0.8rem;">{{ $project['client_name'] }} $</span>
            </h4>
            <h4 class="card-text">Serie: 
                <span style="font-size: 0.8rem;">{{ $project['client_tel'] }}</span>
            </h4>
            <a href="{{ route('projects.edit', $project) }}" class="btn btn-primary">Modifica</a>
        </div>
    </div>

</div>

</main>
@endsection