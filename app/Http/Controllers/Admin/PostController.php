<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('post', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validazione sull'inserimento
        $request->validate([
            // la chiave sarò il name corrispondente nel blade.php
            // il valore sarà la lista dei requisiti per la validazione
            'title' => 'required|string|unique:posts|max:120',
            'author' => 'required|string|max:60',
            'post_content' => 'required|string|min:40',
        ],
        [
            "required" => 'Devi compilare correttamente :attribute',
            "title.required" => 'Non è possibile inserire un post senza titolo',
            "author.max" => "Non è possibile inserire un autore con più di 60 caratteri",
            'post_content.min' => 'Il post deve essere lungo almeno 40 caratteri'
        ]);

        $data = $request->all();

        $post = new Post();
        $post->fill($data);
        $post->slug = Str::slug($post->title, '-');
        $post->save();

        //verifico che esista una chiave tags in data e aggiungo tutti i tag selezionati al post appena salvato
        if(array_key_exists('tags', $data)) $post->tags()->attach($data['tags']); //Se esiste un campo tag allora significa che ne ho selezionato almeno uno allora prendi il post dammi i tag e ai tag aggiungo i tags selezionati 

        return redirect()-> route('admin.posts.show', compact('post'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // dd(Category::pluck('id')->toArray());
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource. Mostra il post per modificare la risorsa specificata
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage. Aggiorna la memoria specificata in memoria
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        // dd($data);

        $post->fill($data);
        $post->update();
        return redirect()->route('admin.posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with("deleted_title", $post->title )->with('alert-message', "$post->title è stato eliminato con successo");
    }
}
