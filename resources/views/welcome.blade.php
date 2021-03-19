@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @foreach ($posts as $post)
            <div class="card mb-4">
                <div class="card-header">{{ $post->title }}</div>

                <div class="card-body">
                    @if ($post->image)
                        <img src="{{ $post->get_image }}" class="card-img-top">
                    @elseif ($post->iframe)
                        <div class="embed-responsive embed-responsive-16by9"> {{!! $post->iframe !!}}</div>
                    @endif
                    <p> {{ $post->get_excerpt }} <br />
                        <a href="{{ route('post', $post) }}"> Leer m&aacute;s</a>
                    </p>
                    <p class="text-muted mb-0">
                        <em> &ndash; {{ $post->user->name }} </em> &nbsp;
                        {{ $post->created_at->format('d-m-Y') }}
                    </p>
                </div>
            </div>
        @endforeach
        {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
