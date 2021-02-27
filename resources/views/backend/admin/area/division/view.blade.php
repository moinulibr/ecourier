@extends('backend.layouts.master')
@section('title','Division')
@section('content')
	<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Division List</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Area</a></li>
                        <li class="breadcrumb-item active">Division</li>
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
                    <h4 class="card-title">Division </h4>
                    
                    <hr>
                    <table id="datatable-buttons" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>English Name</th>
                                <th>Bangla Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                              @foreach($divisions as $divison)
                               <tr>
                                   <td>{{ $loop->iteration }}</td>
                                   <td>{{ $divison->name }}</td>
                                   <td>{{ $divison->bn_name }}</td>
                                   <td>
                                       <a href="" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> Edit</a>
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