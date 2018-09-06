@extends('layouts.app')

@section('content')
    <section class="section">
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="col">
            <div class="row">
                <h1 class="h5">{{ $post->title }}</h1>
                <div class="category" style="color: {{ $post->getCategory->color }}">{{ $post->getCategory->title }}</div>
                {!! $post->content !!}
            </div>
        </div>
    </section>
@endsection