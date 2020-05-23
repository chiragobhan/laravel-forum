@extends('layouts.app')

@section('content')
<div class="container">
    @csrf
    <div class="row justify-content-center">
        @if(!$postRows->isEmpty())
        @foreach($postRows as $post)
        <div style="padding:0;" class="card col-md-5 mr-2 ml-2 mb-3">
            <div class="card-header">
                <div class="text-right">Category: <a href="/category/{{ $post->category }}">{{ $post->category }}</a></div>
            </div>
            @if (!empty($post->image))
            <img class="card-img-top" width="200" height="200" src="/uploads/posts/{{ $post->image }}" alt="{{ $post->title }}">
            @endif
            <div class="card-body">
                <h5 class="card-title"><a href="/post/{{ $post->category }}/{{$post->id}}">{{ $post->title }}</a></h5>
                <p class="card-text">{{ str_limit($post->content, 100) }}</p>
                <p class="card-text"><small class="text-muted">Last Updated: {{ $post->updated_at->format('dS-F-Y, h:i A') }}</small></p>
            </div>
            <div class="card-footer text-muted">
                @if(Auth::user()->id === $post->user_id)
                <div class="text-left">Posted By: <a href="/author/{{$post->user_id}}">You</a></div>
                @else
                <div class="text-left">Posted By: <a href="/author/{{$post->user_id}}">{{ $post->user->name }}</a></div>
                @endif
            </div>
            @if(Auth::user()->id === $post->user_id)
            <div class="card-footer text-muted">
                <div class="row">
                    <a href="/edit/{{$post->category}}/{{$post->id}}" class="btn btn-md btn-warning mb-2 col-md-6">Edit</a>
                    <a href="/delete/{{$post->id}}" class="btn btn-md btn-danger mb-2 col-md-6">Delete</a>
                </div>
            </div>
            @endif
        </div>
        @endforeach
        @else
        <p style="padding: 10px;font-size:20px;">No Posts</p>
        @endif
    </div>
</div>
@endsection