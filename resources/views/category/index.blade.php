@extends('layouts.app')

@section('content')


<section class="content">
     
        <div class="row">
            <div class="col-xs-12" style="width:100%">
            <div class="box">

            <div class="box-header">

                     @if(Session::has('message'))
                     <p class="alert alert-info">{{Session::get('message')}}</p>
                     @endif


                <h3 class="box-title">Category Table</h3>
                <div class="box-tools">
                    <div class="col-md-12 text-right">
                    <a href="{{route('category.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Create</a>
                  </div>
                </div>
            </div>
                
                <div class="box-body table-responsive no-padding">
                   <table class="table table-hover">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @php
                      $i=1;
                    @endphp
                    @foreach ($data as $item)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->description}}</td>
                            <td><img src="{{url($item->image)}}" height="70px" width="70px"></td>
                            <td>
                                @if($item->status==1)
                                <span class="badge bg-success">Active</span>
                                @else
                                <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                              <a href="{{ route('category.edit',$item->id) }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-plus"></i>Edit</a> 
                              <a href="{{route('category.delete',$item->id)}}" class="btn btn-sm btn-outline-danger" onclick="return confirm('Do you want to Delete??')"><i class="fas fa-trash"></i>Delete</a>
                              @if(!empty($item->status))
                              <a href="{{route('category.status',$item->id)}}" class="btn btn-sm btn-outline-danger"><i class="fa fa-times"></i>Inactive</a>
                              @else
                              <a href="{{route('category.status',$item->id)}}" class="btn btn-sm btn-outline-success"><i class="fa fa-check"></i>Active</a>
                              
                              @endif
                            </td>
                            
                            
                        </tr>
                        @php
                          $i++;
                        @endphp
                    @endforeach
                   </table>
                </div>
            </div>
            </div>
        </div>
    </section>




@endsection