@extends('layouts.app')

@section('content')
<!-- Custom styles for this template -->
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
<link href="https://getbootstrap.com/docs/4.1/examples/blog/blog.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/4.0/examples/offcanvas/offcanvas.css" rel="stylesheet">
</head>

<body style="padding-top:0;">

  <form class="needs-validation" method="POST" action="/submitComment">
    @csrf
    <div class="container">
      <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-12 px-0">
          <input type="hidden" name="post_id" value="{{$post->id}}" />
          <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
          <h1 class="display-4 font-italic" name="title">{{$post->title}}</h1>
          <p class="lead mb-0"><a href="#comment" class="text-white font-weight-bold">Comment on this article..</a></p>
        </div>
      </div>
    </div>

    <main role="main" class="container">
      <div class="row">
        <div class="col-md-8 blog-main">

          <div class="blog-post">
            <p class="blog-post-meta">
              {{$post->updated_at->format('F dS, Y')}} by
              @if(Auth::user()->id === $post->user_id)
              <a href="/author/{{$post->user_id}}">You</a>.
              @else
              <a href="/author/{{$post->user_id}}">{{$post->user->name}}</a>.
              @endif
            </p>

            @if (!empty($post->image))
            <img class="card-top mb-3" width="300" height="200" src="/uploads/posts/{{ $post->image }}" alt="{{ $post->title }}">
            @endif

            <p>{{$post->content}}</p>
          </div>
          <p class="blog-post-meta">
            Category: <a href="/category/{{$post->category}}">{{$post->category}}</a>
          </p>
          <nav class="blog-pagination">
            @if($post->flag == '1')
            <a id="comment" class="btn btn-outline-dark mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              Post a Comment
            </a>
            <div class="collapse" id="collapseExample">
              <div class="card card-body">
                <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Comment:</span>
                  </div>
                  <textarea class="form-control" required="required" placeholder="Give a solution here.." name="context" aria-label="context"></textarea>
                  <div class="input-group-append">
                    <button class="btn btn-outline-dark" type="submit">Post</button>
                  </div>
                </div>
              </div>
            </div>
            @else
            <p id="comment" class="btn btn-outline-dark">Comments have been disabled!</p>
            @endif
          </nav>

          <div class="my-3 mb-2 p-3 bg-white rounded box-shadow">
            <h6 class="border-bottom border-gray pb-2 mb-0">Recent comments</h6>
            @if(!$comments->isEmpty())
            @foreach($comments as $comment)
            <div class="media text-muted pt-3">
              <img data-src="/uploads/avatars/{{$comment->user_id}}" alt="" class="mr-2 rounded">
              <p class="media-body pb-3 mb-0 medium lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark">{{$comment->user->name}}</strong>
                {{$comment->context}}
              </p>
              @if((Auth::user()->id === $comment->user_id) || (Auth::user()->type === "admin"))
              <span class="text-right mr-1"> <a href="/editComment/{{$comment->id}}" class="text-warning">Edit</a></span> |
              <span class="text-right ml-1"> <a href="/deleteComment/{{$comment->id}}" class="text-danger">Delete</a></span>
              @endif
            </div>
            @endforeach
            @else
            <p style="padding: 10px;font-size:20px;">No Comments</p>
            @endif
            <small class="d-block text-right mt-3">
              <a href="/comments/{{Auth::user()->id}}">View all your comments</a>
            </small>
          </div>

        </div>

        <aside class="col-md-4 blog-sidebar">

          <div class="p-3">
            <h4 class="font-italic">Related</h4>
            <ol class="list-unstyled mb-0">
              @foreach($categories as $category)
              <li><a href="/post/{{$category->category}}/{{$category->id}}">{{str_limit($category->title, 26)}}</a></li>
              <li>{{str_limit($category->content, 50)}}</li>
              @endforeach
            </ol>
          </div>

          <div class="p-3">
            <h4 class="font-italic">More</h4>
            <ol class="list-unstyled mb-0">
              @foreach($moreCategories as $more)
              <li><a href="/category/{{$more->title}}">{{$more->title}}</a></li>
              @endforeach
            </ol>
          </div>
        </aside>

      </div><!-- /.row -->

    </main><!-- /.container -->

    <footer class="blog-footer">
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>

  </form>

</body>

</html>
@endsection