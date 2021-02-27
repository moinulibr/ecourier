@extends('backend.manpower.layouts.master')

@section('content')
	<!-- start page title -->


	<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">All Admin List</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                        <li class="breadcrumb-item active">Admin list</li>
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
                    <h4 class="card-title">Admin list <a href="" class="float-right btn btn-primary btn-sm">
                <i class="icon nav-icon" data-feather="plus"></i>
                <span class="menu-item" key="t-plus">Create Admin</span>
            </a></h4>
                    
                    <hr>
                    <table id="datatable-buttons" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            <tr>
                                <td>01</td>
                                <td>Md Abu Taleb</td>
                                <td>01723019476</td>
                                <td>abutalebgmtt@gmail.com</td>
                                <td>2011/04/25</td>
                                <td>
                                     <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                     <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
               
                        </tbody>
                    </table>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->



@endsection