@extends('layouts.app')
@section('content')
  <div class="col-md-6" style="max-width:100%">
    <div class="box box-primary">
      <div class="box-header box-border">
        <h3 class="box-title">Edit Page</h3>
      </div>
      <form method="POST" action="{{route('category.update',$data->id)}}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Enter Title" value="{{old('title', $data->title)}}">
            @error('title')
              <span class="error invalid-feedback">{{$message}}</span>
            @enderror
          </div>
          

          <div class="form-group">
              <label>Image</label>
              <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" placeholder="Enter image" value="">
              @error('image')
                <span class="error invalid-feedback">{{$message}}</span>
              @enderror
          </div>
          <div class="form-group">
              <label>Description</label>
              <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="Enter Description" value="{{ old('description', $data->description) }}">
              @error('description')
                  <span class="error invalid-feedback">{{$message}}</span>
              @enderror
          </div>
          

          <div class="form-group">
              <button type="submit" class="btn btn-sm btn-success">Update</button>
          </div>

      </form>
    </div>
  </div>
@endsection