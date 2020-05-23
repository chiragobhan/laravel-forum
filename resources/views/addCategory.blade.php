@extends('layouts.app')

@section('content')
<!-- Custom styles for this template -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="https://getbootstrap.com/docs/4.1/examples/checkout/form-validation.css" rel="stylesheet">


</head>

<body class="bg-light">

  <div class="container">
    <div class="py-2 text-center">
      <h2>Add Category</h2>
    </div>
    <div class="col-md-12 order-md-1">
      <form class="needs-validation" method="POST" action="/postCategory">
        @csrf
        <div class="row">
          <div class="col-md-12">
            <label for="title">Category Name</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Enter the new category name here" required>
            <div class="invalid-feedback">
              Valid category is required.
            </div>
          </div>
        </div>
        <hr class="mb-4">
        <button class="btn btn-dark btn-lg offset-md-5 mb-3" type="submit">Add Category</button>
      </form>
    </div>
  </div>
  </div>

</body>

</html>
@endsection