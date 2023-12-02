<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Vertical (basic) form</h2>
  <form action="{{ route('storenews') }}" method="post">
    @csrf
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{ old('title')}}">
      @error('title')
      <div class="alert alert-warning">
        {{ $message }}
    </div>

    @enderror
    </div>
    <div class="form-group">
        <label for="content">Content:</label>
        <textarea class="form-control" rows="5" id="content" name="content">{{ old('content')}}</textarea>
        @error('content')
      <div class="alert alert-warning">
        {{ $message }}
    </div>

    @enderror
      </div> 
    <!-- <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div> -->
    <!-- <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div> -->
    <div class="form-group">
      <label for="author">Author:</label>
      <input type="text" class="form-control" id="author" placeholder="Write the name of the author" name="author" value="{{ old('author')}}">
      @error('author')
      <div class="alert alert-warning">
        {{ $message }}
    </div>

    @enderror
    </div>
    <!-- <div class="checkbox">
<label><input type="hidden" name="published" value="Off">
<input type="checkbox" id="active" name="published" value="On" class="flat">Can it published?</label></div> -->
    <div class="checkbox">
      <label><input type="checkbox" name="published"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
    
  </form>
</div>

</body>
</html>
