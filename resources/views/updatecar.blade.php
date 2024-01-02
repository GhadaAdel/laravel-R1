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
  <form action="{{ route('updatecar', $car->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method ('put')
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter title" name="carTitle" value={{$car->carTitle}}>
      @error('carTitle')
      <div class="alert alert-warning">
        {{ $message }}
    </div>

    @enderror
</div>
<div class="form-group">
  <label for="description">Description:</label>
  <input type="text" class="form-control" id="description" placeholder="Enter description" name="description" value={{$car->description}}>

  @error('description')
  <div class="alert alert-warning">
    {{ $message }}
</div>
@enderror

</div>
<div class="form-group">
  <label for="shortDescription">shortDescription:</label>
  <input type="text" class="form-control" id="shortDescription" placeholder="Enter shortDescription" name="shortDescription" value={{$car->shortDescription}}>

  @error('shortDescription')
  <div class="alert alert-warning">
    {{ $message }}
</div>
@enderror

</div>
      <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" class="form-control" id="image" name="image" value={{$car->image}}>
        <img src="{{asset ('assets/images/'. $car->image)}}" alt="cars" style="width:300px;">
        @error('image')
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
    {{-- <div class="form-group">
      <label for="author">Author:</label>
      <input type="text" class="form-control" id="author" placeholder="Write the name of the author" name="author">
    </div> --}}
    {{-- <input type="hidden" name="remember" value="Off"> --}}
    <div class="form-group">
      <label for="category_id">category_id:</label>
    <select name="category_id" id="">
      @foreach($categories as $category)
                    <option value="{{ $category->id }}" @selected( $category->id == $car->category_id)>{{ $category->categoryName }}</option>
                @endforeach
    </select>
  </div>
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
