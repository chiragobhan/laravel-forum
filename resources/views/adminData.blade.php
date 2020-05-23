@extends('layouts.app')

@section('content')

<!-- Custom styles for this template -->
<link href="/css/dashboard.css" rel="stylesheet">

<body>

  <main role="main" class="col-md-12 py-0 ml-sm-auto col-lg-12 px-4">
    @if (Route::getCurrentRoute()->getName() === 'users')
    <h2>User(s) </h2>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Type</th>
            <th>Email</th>
            <th>Username</th>
            <th>Avatar?</th>
            <th>Contact</th>
            <th colspan="2">Action(s)</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->type }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->picture }}</td>
            <td>{{ $user->contact }}</td>
            <th><a href="/editUser/{{$user->id}}" class="btn btn-warning">Edit</a></th>
            <th><a href="/deleteUser/{{$user->id}}" class="btn btn-danger">Delete</a></th>
          </tr>
          @endforeach
          @elseif (Route::getCurrentRoute()->getName() === 'allposts')
          <h2>Post(s)</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Title</th>
                  <th>Content</th>
                  <th>Image?</th>
                  <th>Category</th>
                  <th>Posted By</th>
                  <th>Comments Allowed?</th>
                  <th colspan="2">Action(s)</th>
                </tr>
              </thead>
              <tbody>
                @foreach($posts as $post)
                <tr>
                  <td>{{ $post->id }}</td>
                  <td>{{ str_limit($post->title, 25) }}</td>
                  <td>{{ str_limit($post->content, 70) }}</td>
                  <td>{{ $post->image }}</td>
                  <td>{{ $post->category }}</td>
                  <td>{{ $post->user->name }}</td>
                  @if($post->flag == 1)
                  <td>Yes</td>
                  @else
                  <td>No</td>
                  @endif
                  <th><a href="/edit/{{$post->category}}/{{$post->id}}" class="btn btn-warning">Edit</a></th>
                  <th><a href="/delete/{{$post->id}}" class="btn btn-danger">Delete</a></th>
                </tr>
                @endforeach
                @elseif (Route::getCurrentRoute()->getName() === 'allcomments')
                <h2>Comment(s)</h2>
                <div class="table-responsive">
                  <table class="table table-striped table-sm">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Comment</th>
                        <th>Posted on</th>
                        <th>Posted By</th>
                        <th colspan="2">Action(s)</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($comments as $comment)
                      <tr>
                        <td>{{ $comment->id }}</td>
                        <td>{{ str_limit($comment->context, 70) }}</td>
                        <td>{{ str_limit($comment->post->title, 25) }}</td>
                        <td>{{ $comment->user->name }}</td>
                        <th><a href="/editComment/{{$comment->id}}" class="btn btn-warning">Edit</a></th>
                        <th><a href="/deleteComment/{{$comment->id}}" class="btn btn-danger">Delete</a></th>
                      </tr>
                      @endforeach
                      @elseif (Route::getCurrentRoute()->getName() === 'allcategories')
                      <h2>Categories <a href="/addCategory" class="btn btn-success">Add a new Category</a> </h2>
                      <div class="table-responsive">
                        <table class="table table-striped table-sm">
                          <thead>
                            <tr>
                              <th>Id</th>
                              <th>Title</th>
                              <th colspan="2">Action(s)</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($categories as $category)
                            <tr>
                              <td>{{ $category->id }}</td>
                              <td>{{ str_limit($category->title, 70) }}</td>
                              <th><a href="/editCategory/{{$category->id}}" class="btn btn-warning">Edit</a></th>
                              <th><a href="/deleteCategory/{{$category->id}}" class="btn btn-danger">Delete</a></th>
                            </tr>
                            @endforeach
                            @endif
                          </tbody>
                        </table>
                      </div>
  </main>
  </div>
  </div>

</body>

</html>
@endsection