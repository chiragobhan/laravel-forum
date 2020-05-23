@extends('layouts.app')

@section('content')
<!-- Custom styles for this template -->
<script type="text/javascript" src="http://code.jquery.com/jquery-3.3.1.min.js"></script>

<!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="https://getbootstrap.com/docs/4.1/examples/checkout/form-validation.css" rel="stylesheet">


</head>

<body class="bg-light">

  <div class="container">
    <div class="py-2 text-center">
      <h2>Edit user data</h2>
    </div>
    <div class="col-md-12 order-md-1">
      <form class="needs-validation" method="POST" action="/postUserData" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <input type="hidden" name="id" value="{{$profileData->id}}">
          <div class="col-md-12 mb-3">
            @if (!empty($profileData->picture))
            <img src="/uploads/avatars/{{$profileData->picture}}" class="img-rounded mr-2" height="150" width="200" alt="{{$profileData->name}}">
            @endif
            <label class="btn btn-dark" for="avatar">
              <input id="avatar" name="avatar" type="file" style="display:none" onchange="$('#upload-file-info').html(this.files[0].name)">
              Upload your avatar
            </label>
            <span class='label label-info' value="" id="upload-file-info"></span>
          </div>
          <div class="col-md-6 mb-3">
            <label for="contact">Contact No</label>
            <input type="number" class="form-control" name="contact" id="contact" placeholder="" value="{{$profileData->contact}}" required>
            <div class="invalid-feedback">
              Valid contact number is required.
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="" value="{{$profileData->name}}" required>
            <div class="invalid-feedback">
              Valid name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="username">Username</label>
            <input type="text" disabled class="form-control" name="username" id="username" placeholder="" value="{{$profileData->username}}" required>
            <div class="invalid-feedback">
              Valid username is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="email">Email</label>
            <input type="email" disabled class="form-control" name="email" id="email" placeholder="" value="{{$profileData->email}}" required>
            <div class="invalid-feedback">
              Valid email is required.
            </div>
          </div>

        </div>

        <hr class="mb-4">
        <button class="btn btn-dark btn-lg offset-md-5 mb-3" type="submit">Edit Profile</button>
      </form>
    </div>
  </div>
  </div>

</body>

</html>
@endsection