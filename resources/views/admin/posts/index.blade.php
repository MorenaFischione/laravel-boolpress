
@extends('layouts.app')

@section('content')
    <div class="container">

        @if (session("deleted_title"))
            <div class="alert alert-warning">
                {{session('alert-message')}}
            </div>
        @endif
        
        <header class="p-3">
            <h1>Post pubblicati</h1>
            <a href="{{route("admin.posts.create")}}">Crea nuovo post</a>
        </header>

        <table class="table table-bordered p-5">
            <thead>
                <th class="col">Titolo</th>
                <th class="col">Categoria</th>
                <th class="col">Di</th>
                <th class="col">Tags</th>
                <th class="col">Scritto il</th>
                <th class="col">Modifica</th>
                <th class="col">Cancella</th>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td><a href="{{ route('admin.posts.show', $post->id ) }}">{{ $post->title }}</a></td>
                        <td>@if ($post->category) 
                            
                            <span class="badge badge-primary px-4">{{ $post->category->name }} </span>
                            
                            @else <span class="badge badge-primary ">Nessuna categoria</span> @endif </td>
                        <td>{{ $post->user->name}}</td>
                        <td>
                            @forelse ($post->tags as $tag)
                                <span class="bagde badge-pill" style="background-color: {{ $tag->color}} ">{{$tag->name}}</span>
                            @empty
                                Nessun tag
                            @endforelse
                        </td>

                        <td>{{ $post->post_date}}</td>
                        <td> <a href="{{ route('admin.posts.edit', $post->id)}}" class="btn btn-primary">Modifica</a></td>
                        <td> 
                            <form action="{{route('admin.posts.destroy', $post->id )}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn-sm btn-danger" type="submit">Elimina il post</a>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Non ci sono post da visualizzare</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>


@endsection