<!DOCTYPE html>
<html lang="en">
<head>
  <title>News List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>News</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Title</th>
        <th>Content</th>
        <th>Published</th>
        <th>Author</th>
        <th>Restore</th>
        <th>forceDelete</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>{{$post->title}}</td>
            <td>{{$post->content}}</td>
            <td>{{$post->published ? 'Yes ✔' : 'No ✖'}}</td>
            <td>{{$post->author}}</td>
            <td><a href="restorepost/{{$post->id}}">Restore</a></td>
            <td><a href="forcepost/{{$post->id}}">forceDelete</a></td>
          </tr>
        @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
