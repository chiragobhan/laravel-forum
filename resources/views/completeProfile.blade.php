@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Complete your Profile</title>

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
      <h2>Complete your Profile</h2>
    </div>
    <div class="col-md-12 order-md-1">
      <h5 class="mb-5">Fill up these fields to be able to discovered by companies</h5>
      <form class="needs-validation" method="POST" action="/postProfileData" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <input type="hidden" name="username" value="{{$profileData->username}}">
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
        </div>

        <hr class="mb-4">
        <button class="btn btn-dark btn-lg offset-md-5 mb-3" type="submit">Complete Profile</button>
      </form>
    </div>
  </div>
  </div>

</body>

</html>
@endsection