@extends('layouts.app')

@section('content')
    <div class="container">
        <header>
            <h1>Crea un nuovo post</h1>
        </header>

        <section id="post-form">
            <form action="{{route('admin.posts.store', $post->id)}}" method="post">
                @csrf
                <div class="mb-3 form-group">
                    <label for="title" class="form-label">Titolo del post</label>
                    <input type="text" id="title" class="form-control" placeholder="Inserisci il titolo del post" name="title" value={{$post->title}}>
                </div>
                <div class="mb-3 form-group">
                    <label for="author" class="form-label">Autore del post</label>
                    <input type="text" id="author" class="form-control" placeholder="Inserisci l'autore del post" name="author" value={{$post->author}}>
                </div>
                <div class="mb-3 form-group">
                    <label for="post_date" class="form-label">Autore del post</label>
                    <input type="date" id="post_date" class="form-control" placeholder="Inserisci la data di creazione del post" name="post_date" value={{$post->post_date}}>
                </div>
                <div class="mb-3 form-group">
                    <label for="post_content" class="form-label">Inserisci il testo del post</label>
                    <textarea type="textarea" id="post_content" class="form-control" placeholder="Inserisci il testo del post" name="post_content" >{{$post->post_content}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Crea</button>
                <button type="reset" class="btn btn-secondary">Cancella i dati</button>
            </form>
        </section>
    </div>
@endsection