@extends('layouts.app')

@section('content')
    <div class="container">
        <header>
            <h1>Modifica il post</h1>
        </header>

        <section id="post-form">
            <form action="{{route('admin.posts.update', $post->id)}}" method="post">
                @csrf
                @method('PATCH')
                <div class="mb-3 form-group">
                    <label for="title" class="form-label">Titolo del post</label>
                    <input type="text" id="title" class="form-control" placeholder="Inserisci il titolo del post" name="title" value={{old('title', $post->title)}}>
                </div>

                <div class="mb-3 form-group">
                    <label for="category_id" >Categoria</label>
                    <select name="category_id" id="category_id">
                        <option value="{{null}}">Senza Categoria</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 form-group">
                    <legend class="h5">Tags</legend>
                    <div class="form-check form-check-inline">
                        @foreach ( $tags as $tag)
                            <input type="checkbox" class="form-check-input" id="tag-{{$tag->id}}" value="{{$tag->id}}" name="tags[]" @if (in_array($tag->id, old('tags', $tagIds ? $tagIds : []))) checked    
                            @endif>
                            <label class="form-check-label mx-1" for="tag-{{$tag->id}}">{{$tag->name}}</label>
                        @endforeach
                        
                    </div>
                </div>

               
                <div class="mb-3 form-group">
                    <label for="author" class="form-label">Autore del post</label>
                    <input type="text" id="author" class="form-control" placeholder="Inserisci l'autore del post" name="author" value={{old('author', $post->author)}}>
                </div>
                <div class="mb-3 form-group">
                    <label for="post_date" class="form-label">Autore del post</label>
                    <input type="date" id="post_date" class="form-control" placeholder="Inserisci la data di creazione del post" name="post_date" value={{$post->post_date}}>
                </div>
                <div class="mb-3 form-group">
                    <label for="post_content" class="form-label">Inserisci il testo del post</label>
                    <textarea type="textarea" id="post_content" class="form-control" placeholder="Inserisci il testo del post" name="post_content" >{{old('post_content',$post->post_content)}}</textarea>
                </div>


                <button type="submit" class="btn btn-primary">Modifica</button>
                <button type="reset" class="btn btn-secondary">Cancella i dati</button>
            </form>
        </section>
    </div>
@endsection
            

        