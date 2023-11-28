<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update car</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Update car</h2>
  <form action="{{ route('updatecar', $car->id) }}" method="post">
    @csrf
    @method ('put')
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter title" name="carTitle" value={{$car->carTitle}}>
    </div>
    <div class="form-group">
        <label for="content">description:</label>
        <textarea class="form-control" rows="5" id="description" name="description">{{$car->description}}</textarea>
      </div> 
    <!-- <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div> -->
    <!-- <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div> -->
    {{-- <div class="form-group">
      <label for="author">Author:</label>
      <input type="text" class="form-control" id="author" placeholder="Write the name of the author" name="author">
    </div> --}}
    {{-- <input type="hidden" name="remember" value="Off"> --}}
    <div class="checkbox">
<label>
<input type="checkbox" id="active" name="published" @checked($car->published)>Can it published?</label></div>
    <!-- <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div> -->
    <button type="submit" class="btn btn-default">Submit</button>
    
  </form>
</div>

</body>
</html>
