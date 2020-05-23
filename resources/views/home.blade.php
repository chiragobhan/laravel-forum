@extends('layouts.app')

@section('content')
<div style="max-width: 100%;" class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mb-5">
                <div class="card-header">Hello, {{ Auth::user()->username }}! Have a question? Ask our users</div>

                <form class="needs-validation" method="POST" action="/submitPost" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif

                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Title</span>
                            </div>
                            <input type="text" required="required" class="form-control" placeholder="State the problem" name="title" aria-label="title" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Details</span>
                            </div>
                            <textarea class="form-control" required="required" placeholder="Explain the problem in detail" name="content" aria-label="content"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-4 ml-4 mb-3">
                                <select required class="dropdown" name="category">
                                    <option class="btn btn-dark dropdown-toggle" value="" selected="selected" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Select a category
                                    </option>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @foreach($categorieRows as $category)
                                        <option class="dropdown-item" name="category" value="{{ $category->title }}">{{ $category->title }}</option>
                                        @endforeach
                                    </div>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="btn btn-dark" for="image">
                                    <input id="image" name="image" type="file" style="display:none" onchange="$('#upload-file-info').html(this.files[0].name)">
                                    Upload image (optional)
                                </label>
                                <span class='label label-info' value="" id="upload-file-info"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-lg btn-block btn-dark">Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        @foreach($postRows as $post)
        <div style="padding:0;" class="card col-md-2 mr-2 ml-2 mb-3">
            <div class="card-header">
                <div class="text-right">Category: <a href="/category/{{ $post->category }}">{{ $post->category }}</a></div>
            </div>
            @if (!empty($post->image))
            <img class="card-img-top" width="200" height="200" src="/uploads/posts/{{ $post->image }}" alt="{{ $post->title }}">
            @endif
            <div class="card-body">
                <h5 class="card-title"> <a href="post/{{ $post->category }}/{{$post->id}}">{{ $post->title }}</a></h5>
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
            @if((Auth::user()->id === $post->user_id) || (Auth::user()->type === "admin"))
            <div class="card-footer text-muted">
                <div class="row">
                    <a href="/edit/{{$post->category}}/{{$post->id}}" class="btn btn-md btn-warning mb-2 col-md-6">Edit</a>
                    <a href="/delete/{{$post->id}}" class="btn btn-md btn-danger mb-2 col-md-6">Delete</a>
                </div>
            </div>
            @endif
        </div>
        @endforeach
    </div>
</div>
@endsection