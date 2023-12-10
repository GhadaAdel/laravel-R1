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
  <h2>Add Place</h2>
  <form action="{{ route('addplace') }}" method="post" enctype="multipart/form-data">
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
  <label for="description">Description:</label>
  <input type="text" class="form-control" id="description" placeholder="Enter description" name="description" value="{{ old('description')}}">

  @error('description')
  <div class="alert alert-warning">
    {{ $message }}
</div>
@enderror

    <div class="form-group">
      <label for="price">PriceFrom:</label>
      <input type="text"  class="form-control" name="From" id="From" placeholder="Enter price" value="{{ old('From')}}">
      @error('From')
      <div class="alert alert-warning">
        {{ $message }}
    </div>
    @enderror

    </div>

    <div class="form-group">
      <label for="price">PriceTo:</label>
      <input type="text"  class="form-control" name="To" id="To" placeholder="Enter price" value="{{ old('To')}}">
      @error('To')
      <div class="alert alert-warning">
        {{ $message }}
    </div>
    @enderror

    </div>

    <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" class="form-control" id="image" name="image" value="{{ old('image')}}">

      @error('image')
      <div class="alert alert-warning">
        {{ $message }}
    </div>
    @enderror

    </div>

    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
