@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">{{ $post->title }}
                    @if ($post->image)
                        <img src="{{ $post->get_image }}" class="card-img-top">
                    @endif
                    <p class="text-muted mb-0">
                        <em> &ndash; {{ $post->user->name }} </em> &nbsp;
                        {{ $post->created_at->format('d-m-Y') }}
                    </p>
                </div>

                <div class="card-body">
                    <p> {{ $post->content }} <br /></p>
                    @if ($post->iframe)
                        <div class="embed-responsive embed-responsive-16by9"> {{!! $post->iframe !!}}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection