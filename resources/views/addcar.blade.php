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
  <div>
    <a href="{{ LaravelLocalization::getLocalizedURL('en') }}">English</a>
    <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}">Arabic</a>
</div>
  <h2>{{ __('messages.carForm')}}</h2>
  <form action="{{ route('addcar') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="title">{{ __('messages.title')}}</label>
      <input type="text" class="form-control" id="title" placeholder="{{ __('messages.title2')}}" name="carTitle" value="{{ old('carTitle')}}">
      @error('carTitle')
      <div class="alert alert-warning">
        {{ $message }}
    </div>

    @enderror
</div>

    <div class="form-group">
      <label for="description">{{ __('messages.description')}}</label>
      <input type="text" class="form-control" id="description" placeholder="{{ __('messages.description2')}}" name="description" value="{{ old('description')}}">

      @error('description')
      <div class="alert alert-warning">
        {{ $message }}
    </div>
    @enderror

    </div>

    <div class="form-group">
      <label for="shortDescription">{{ __('messages.shortdescription')}}</label>
      <input type="text" class="form-control" id="shortDescription" placeholder="{{ __('messages.shortdescription2')}}" name="shortDescription" value="{{ old('shortDescription')}}">

      @error('shortDescription')
      <div class="alert alert-warning">
        {{ $message }}
    </div>
    @enderror

    </div>
    <div class="form-group">
      <label for="image">{{ __('messages.image')}}</label>
      <input type="file" class="form-control" id="image" name="image" value="{{ old('image')}}">

      @error('image')
      <div class="alert alert-warning">
        {{ $message }}
    </div>
    @enderror

    </div>
    <div class="form-group">
      <label for="category_id">{{ __('messages.category')}}</label>
    <select name="category_id" id="">
      <option value="">{{ __('messages.category2')}}</option>
      @foreach ($categories as $category)
      <option value="{{ $category->id}}">{{ $category->categoryName}}</option>
      @endforeach
    </select>
  </div>

      <div class="checkbox">
        <label><input type="checkbox" name="published">{{ __('messages.remember')}}</label>
      </div>
    <button type="submit" class="btn btn-default">{{ __('messages.submit')}}</button>
  </form>
</div>

</body>
</html>
