@extends('layouts.app')

@section('content')

     <div class="col-md-6" style="max-width:100%">
            <div class="box box-primary">

            <div class="box-header box-border">
              <h3 class="box-title">Create</h3>
            </div>
            <div class="col-md-12 text-right">
              <a href="{{route('category.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-chevron-left"></i>Back</a>
            </div>


<form method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
       <label>Title</label>
       <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
    </div>
    @if($errors->any())
    <div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach  
    </ul>
    </div>
    @endif

     <div class="form-group">
         <label>Image</label>
         <input type="file" class="form-control" name="image" id="image" placeholder="Enter image">
     </div>
     @if($errors->any())
    <div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach  
    </ul>
    </div>
    @endif

    <!-- <div class="form-group">
         <label>Category</label>
         <input type="text" class="form-control" name="category" id="category" placeholder="Enter Category">
     </div>
     @if($errors->any())
    <div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach  
    </ul>
    </div>
    @endif -->

    <div class="form-group">
         <label>Description</label>
         <input type="text" class="form-control" name="description" id="description" placeholder="Enter Description">
     </div>
     @if($errors->any())
    <div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach  
    </ul>
    </div>
    @endif

    <div class="form-group">
        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
    </div>

</form>

</div>
</div>

@endsection