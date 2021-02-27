@extends('backend.layouts.master')
@section('title','Parcel Type List')
@section('content')
	<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Parcel Type List</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Parcel Type</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

 
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Parcel Type  </h4>
                    
                    <hr>
                    <table id="datatable-buttons" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                              @foreach($parcel_typies as $parcel_type)
                               <tr>
                                   <td>{{ $loop->iteration }}</td>
                                   <td>{{ $parcel_type->name }}</td>
                                   <td>
                                       <a href="{{ route('parceltype.destroy',$parcel_type->id) }}" class="btn btn-danger btn-sm disabled" id="delete"> <i class="fa fa-trash"></i> Delete</a>
                                    </td>
                               </tr>

                              @endforeach
               
                        </tbody>
                    </table>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->



@endsection