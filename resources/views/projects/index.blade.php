@extends('layouts.app')

@section('content')
<main>

<div class="projects-list">

    <div class="container">

        <table class="table main-table">
            <thead>
                <tr>          
                    <th scope="col">Titolo</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Nome Cliente</th>
                    <th scope="col">Telefono Cliente</th>
                    <th scope="col">Opzioni</th>
                </tr>
            </thead>
            <tbody>

                @foreach($projects as $project)
                <tr>
                    <td>
                        {{ $project->title }} <br>
                        <a href="{{ route('projects.show', $project->id) }}">Vai al progetto</a>
                    </td>
                    <td>{{ $project->description }}</td>                   
                    <td>{{ $project->client_name }}</td>
                    <td>{{ $project->client_tel }}</td>
                    <td class="btn-td" >
                        <a href="{{ route('projects.edit', $project) }}" class="edit-btn btn btn-secondary btn-sm mb-1">EDIT</a>
                        <form class="mb-auto" action="{{ route('projects.destroy', $project) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit"  class="delete-btn btn btn-danger btn-sm" value="DELETE">
                        </form>
                        
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</div>

</main>
@endsection