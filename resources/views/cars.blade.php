<!DOCTYPE html>
<html lang="en">
<head>
  <title>Car List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Cars</h2>
  <p>The .table-hover class enables a hover state on table rows:</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Title</th>
        <th>Content</th>
        <th>Published</th>
        <th>Image</th>
        <th>category_id</th>
        <th>categoryName</th>
        <th>Edit</th>
        <th>Show</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($cars as $car)
        <tr>
            <td>{{$car->carTitle}}</td>
            <td>{{$car->description}}</td>
            <td>{{$car->published ? 'Yes ✔' : 'No ✖'}}</td>
            <td>{{$car->image}}</td>
            <td>{{$car->category_id}}</td>
            <td>{{$car->category->categoryName}}</td>
            <td><a href="editcar/{{$car->id}}">Edit</a></td>
            <td><a href="showcar/{{$car->id}}">Show</a></td>
            <td><a href="deletecar/{{$car->id}}">Delete</a></td>
          </tr>
        @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
