@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Post index</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h1>Post index</h1>


                        @foreach($content as $post)
                            {{ $post->title }}
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
