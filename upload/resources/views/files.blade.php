<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Upload Multiple Files in Laravel 7 with Coding Driver</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />


<style>
.invalid-feedback {
  display: block;
}
</style>
</head>
<body>

<div class="container mt-4">

    <form method="post" action="{{ route('files.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
          <input type="file" name="files[]" multiple class="form-control" accept="image/*">
          @if ($errors->has('files'))
            @foreach ($errors->get('files') as $error)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $error }}</strong>
            </span>
            @endforeach
          @endif
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-success">Save</button>
      </div>
    </form>
</div>
</body>
</html>