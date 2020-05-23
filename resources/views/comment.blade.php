@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Edit your comment</title>

  <!-- Custom styles for this template -->
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.3.1.min.js"></script>

  <!-- Bootstrap core CSS -->
  <link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="https://getbootstrap.com/docs/4.1/examples/checkout/form-validation.css" rel="stylesheet">


</head>

<body class="bg-light">

  <div class="container">
    <div class="py-5 text-center">
      <h2>Edit your comment</h2>
    </div>
    <div class="col-md-12 order-md-1">
      <form class="needs-validation" method="POST" action="/updateComment">
        @csrf
        <div class="row">
          <input type="hidden" name="comment_id" value="{{$commentData->id}}">

          <div class="col-md-12 mb-3">
            <label for="context">Comment:</label>
            <textarea class="form-control" name="context" id="context" placeholder="" required>{{$commentData->context}}</textarea>
            <div class="invalid-feedback">
              Valid comment is required.
            </div>
          </div>

        </div>

        <hr class="mb-4">
        <button class="btn btn-dark btn-lg offset-md-5 mb-3" type="submit">Edit comment</button>
      </form>
    </div>
  </div>
  </div>

</body>

</html>
@endsection