@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">Hello, {{ Auth::user()->username }}! Have a question? Ask our users</div>

                <form class="needs-validation" novalidate method="POST" action="/updatePost" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif

                        <input type="hidden" name="post_id" value="{{ $postData->id }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Title</span>
                            </div>
                            <input type="text" value="{{ $postData->title }}" required="required" class="form-control" placeholder="State the problem" name="title" aria-label="title" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Details</span>
                            </div>
                            <textarea class="form-control" required="required" placeholder="Explain the problem in detail" name="content" aria-label="content">{{ $postData->content }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                @if (!empty($postData->image))
                                <img src="/uploads/posts/{{$postData->image}}" class="img-rounded mb-2 mr-2" height="150" width="200" alt="{{$postData->title}}">
                                @endif
                                <label class="btn btn-dark" for="image">
                                    <input id="image" name="image" type="file" style="display:none" onchange="$('#upload-file-info').html(this.files[0].name)">
                                    Change image (optional)
                                </label>
                                <span class='label label-info' value="" id="upload-file-info"></span>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select class="dropdown" required="required" name="category">
                                    <option class="btn btn-dark dropdown-toggle" selected="selected" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ $postData->category }}
                                    </option>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @foreach($categorieRows as $category)
                                        <option class="dropdown-item" name="category" value="{{ $category->title }}">{{ $category->title }}</option>
                                        @endforeach
                                    </div>
                                </select>
                            </div>
                            <span class="mb-2">Allow Comments:</span>
                            <span>
                                <div class="col-md-2 mb-3">
                                    <label class="switch">
                                        <input type="checkbox" name="flag" value="1" {{$postData->flag}}>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-lg btn-block btn-dark">Update Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection