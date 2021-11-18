
@extends('layouts.app')

@section('content')
    <div class="container">
        <header class="p-3">
            <h1>Post pubblicati</h1>
            <a href="{{route("admin.posts.create")}}">Crea nuovo post</a>
        </header>

        <table class="table table-bordered p-5">
            <thead>
                <th class="col">Titolo</th>
                <th class="col">Categoria</th>
                <th class="col">Di</th>
                <th class="col">Scritto il</th>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td><a href="{{ route('admin.posts.show', $post->id ) }}">{{ $post->title }}</a></td>
                        <td>@if ($post->category) 
                            
                            <span class="badge badge-primary px-4">{{ $post->category->name }} </span>
                            
                            @else Nessuna categoria @endif </td>
                        <td>{{ $post->author}}</td>
                        <td>{{ $post->post_date}}</td>
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