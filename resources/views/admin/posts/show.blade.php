@extends('layouts.app')

@section('content')
@section('content')
    <div class="card m-5 ">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->post_content }}</p>
            <a href=" {{ route('admin.posts.index')}}" class="btn btn-primary">Back</a>
        </div>
    </div>
@endsection

