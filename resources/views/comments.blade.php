@extends('layouts.app')

@section('content')
<!-- Custom styles for this template -->
<link href="https://getbootstrap.com/docs/4.1/examples/offcanvas/offcanvas.css" rel="stylesheet">
</head>

<body style="padding-top:0;" class="bg-light">

  <main role="main" class="container">

    <div class="my-3 p-3 bg-white rounded box-shadow">
      <h6 class="border-bottom border-gray pb-2 mb-0">Your Comments</h6>
      @if(!$comments->isEmpty())
      @foreach($comments as $comment)
      <div class="media text-muted pt-3">
        <img data-src="/uploads/avatars/{{$comment->user_id}}" alt="" class="mr-2 rounded">
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
          <strong class="d-block text-gray-dark">
            @if(Auth::user()->id === $comment->user_id)
            <a href="/author/{{ $comment->user_id }}">You</a>
            @else
            <a href="/author/{{ $comment->user_id }}">{{$comment->user_id}}</a>
            @endif
            commented on <a href="/post/{{$comment->post->category}}/{{ $comment->post_id }}">{{$comment->post->title}}</a>
          </strong>
          {{$comment->context}}
        </p>
        @if(Auth::user()->id === $comment->user_id)
        <span class="text-right mr-1"> <a href="/editComment/{{$comment->id}}" class="text-warning">Edit</a></span> |
        <span class="text-right ml-1"> <a href="/deleteComment/{{$comment->id}}" class="text-danger">Delete</a></span>
        @endif
      </div>
      @endforeach
      @else
      <p style="padding: 10px;font-size:20px;">No Comments</p>
      @endif
    </div>
  </main>

</body>

</html>
@endsection