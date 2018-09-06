@extends('layouts.app')

@section('content')
    <div class="container">

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <h1>{{ $meta->title }}</h1>

            <div class="content">
        @forelse($content as $post)
            {{--@dd($post)--}}
             <h2>
                 <a href="{{ route('news.show', ['category'=>$post->getCategory->slug, 'slug'=>$post->slug]) }}" class="link">
                 {{ $post->title }}
                 </a>
             </h2>
            <a href="{{ route('news.category', ['category'=>$post->getCategory->slug ]) }}" class="category" style="color: {{ $post->getCategory->color }}">{{ $post->getCategory->title }}</a>
                    <hr>
            <div class="content">
                {{ $post->content }}
            </div>
        @empty
            <div class="alert alert-success" role="alert">
                Нет новостей!
            </div>
        @endforelse
            </div>
    </div>
@endsection
