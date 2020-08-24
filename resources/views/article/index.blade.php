@extends('layouts.app')

@section('content')
    @if ($status)
    <h1>{{$status}}</h1>
    @endif
    <h1>Список статей</h1>
    <small>
        <a href="{{route('articles.create')}}">create article</a>
    </small>
    @foreach ($articles as $article)
        <h2>
            <a href="{{route('articles.show', $article->id)}}">{{$article->name}}</a>
        </h2>
        <small>
            <a href="{{route(('articles.edit'), $article)}}">edit</a>
            <a href="{{route(('articles.destroy'), $article)}}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">delete</a>
        </small>
        {{-- Str::limit – функция-хелпер, которая обрезает текст до указанной длины --}}
        {{-- Используется для очень длинных текстов, которые нужно сократить --}}
        <div>{{Str::limit($article->body, 200)}}</div>
    @endforeach

    {{ $articles->links() }}
@endsection
