
@extends('layouts.app')

@section('content')
    <div class="container">
        <header class="p-3">
            <h1>Post pubblicati</h1>
            {{-- <a href="{{route("admin.posts.create")}}">Crea nuovo post</a> --}}
        </header>

        <table class="table table-bordered p-5">
            <thead>
                <th class="col">Titolo</th>
                <th class="col">Di</th>
                <th class="col">Scritto il</th>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td><a href="{{ route('admin.posts.show', $post->id ) }}">{{ $post->title }}</a></td>
                        <td>{{ $post->author}}</td>
                        <td>{{ $post->post_date}}</td>
                        {{-- <td><a href="{{ route('admin.posts.edit', $post ) }}" class="btn btn-secondary">Modifica</a></td> --}}
                        {{-- <td>
                            <form action="{{route('admin.posts.destroy', $post->id )}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-alert" type="submit">Elimina il post</a>
                            </form>
                        </td> --}}
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