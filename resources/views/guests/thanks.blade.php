@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card p-5">
            <div class="card-header">
                <h1>Ciao {{ session('lead')}}! Grazie per averci contattato!</h1>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>     
                <p>
                    <h4>Visto che il tuo provider è {{session('lead')}}, controlla nella cartella di spam</h4>
                    <a href="{{ route('guests.home') }}">Clicca qui per tornare alla home!</a>
                </p>   
                @endif
                
            </div>
        </div>
    </div>
@endsection