
@extends('backend.layouts.master')
@section('title','Add New Role')
@section('content')

    
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!---------------------------Top Page Title------------------->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        <!---------------------Page Title------------------->
                            <h1 class="m-0 text-dark">
                                User Role Management
                            </h1>
                        <!---------------------Page Title------------------->
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active"></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!---------------------Top Page Title End Here------------------->




            <!---------------------Main content Start here--------------->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!--Need Card-->
                    <!---------row------ ---->
                    <div class="row"><!---row ---->

                        <div class="col-6">
                            <div class="card height-auto mg-t-30">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h5>Add Role</h5>
                                    </div>
                                </div>
                                    <form method="POST" action="{{route('admin.user-role.store')}}" class="new-added-form form-inline">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-12 form-group">
                                                <label class="col-xl-4 col-lg-4 col-12">Role:</label>
                                                <input name="name" type="text" value="{{old('name')}}" placeholder="Role Name" class="col-xl-8 col-lg-8 col-12 form-control">
                                                @if($errors->has('name'))
                                                <span class="margin-left-33">
                                                <strong style="color:red;">{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            @if(routeURL_permission('user_roles','store'))
                                            <div class="form-group col-12 mg-t-8">
                                                <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Add Role</button>
                                            </div>
                                            @endif
                                        </div>
                                    </form>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card height-auto mg-t-30">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h5>View Role</h5>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table display  text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input checkAll">
                                                        <label class="form-check-label">ID</label>
                                                    </div>
                                                </th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($roles as $item) 
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input">
                                                    <label class="form-check-label">#{{$loop->index +1}}</label>
                                                    </div>
                                                </td>
                                                <td>{{$item->name}}</td>
                                                <td>
                                                <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="flaticon-more-button-of-three-dots"></span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            @if(routeURL_permission('user_roles','edit'))
                                                            <a class="dropdown-item edit" href="#"  data-name="{{ $item->name }}" data-url="{{route('admin.user-role.update',$item->id)}}"    data-toggle="modal" data-target="#myEditModal"><i class="fas fa-edit text-orange-peel"></i>Edit</a>
                                                            @endif
                                                            @if(routeURL_permission('user_roles','delete'))
                                                            <a class="dropdown-item delete" href="#" data-url="{{route('admin.user-role.delete',$item->id)}}"   data-toggle="modal" data-target="#myModal"><i class="fas fa-times text-orange-red"></i>Delete</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $roles->links() }}
                                </div>
                                <!---Table responsive end here ---->
                            </div>
                        </div><!--col-->
                

                        
                    </div><!---row ---->
                    <!---------row------ ---->
                </div>
            </section>
            <!-- Main content -->
            <!---------------------Main content end here--------------->

        </div>
        <!-- Content Wrapper. Contains page content -->



  <!-- The Delete  Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content modal-sm">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" style="text-align:center">Delete This Role</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            Are You Sure To Delete This?
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <a class="btn btn-info" id="delete" href="">Yes</a>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



 <!-- The Edit  Modal -->
 <div class="modal" id="myEditModal">
    <div class="modal-dialog">
      <div class="modal-content modal-lg">
        <form action="" method="POST" id="editFormAction">
            @csrf
            @method("PUT")
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title" style="text-align:center">Edit This Role</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
            
                <div class="col-xl-12 col-lg-12 col-12 form-group">
                    <label class="col-xl-12 col-lg-12 col-12">Role:</label>
                    <input name="name" id="name" type="text" value="" placeholder="Role Name" class="col-xl-12 col-lg-12 col-12 form-control">
                    @if($errors->has('name'))
                    <span class="margin-left-33">
                    <strong style="color:red;">{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>

            
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
            @if(routeURL_permission('user_roles','update'))
            <input type="submit" class="btn btn-info" value="Update">
            @endif
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
  </div>





<!--- push some things from here--->
<!----custom js link here----->
@push('js')


 <script>
    $('.edit').click(function(){
        let url  = $(this).data('url');
        let name  = $(this).data('name');
        $('#name').val(name);
        $('#editFormAction').attr("action",url);
    });
</script>

 <script>
    $('.delete').click(function(){
        let url  = $(this).data('url');
        $('#delete').attr("href",url);
    });
</script>
@endpush
<!----custom js link here----->
<!--- push some things from here--->
@endsection


















{{---
@extends('backend.layouts.master')
@section('title','Add New Role')
@section('content')
<!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
<!---#############################################-->
<!--- push some things from here--->
    <!----for title---->
    @push('title')
       User Role
    @endpush
    <!----for title---->
<!--@@@@@@@@@@@@@-->
<!----custom css link here----->
   @push('css')

   <style>
    .margin-left-33{
     margin-left:33%;
    }

    .not_cash{
        display:none;
    }
    .mobile_banking_type{
        display:none;
    }
</style>
   @endpush
<!----custom css link here----->
<!--@@@@@@@@@@@@@-->
<!--- push some things from here--->
<!---#############################################-->


<!---#############################################-->
<!-- Breadcubs Area Start Here -->
    <!------top page ,page identify------->
    @section('page_identify')
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <h3></h3>
        </div>
        <div class="col-sm-12 col-md-8">
            <div style="float:right">
                <ul>
                    <li>User Role </li>
                    <li>
                        <a href="#">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @endsection
    <!------top page ,page identify------->
    <!-- Breadcubs Area End Here -->
<!---#############################################-->
<!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
  


@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
@if (session('error'))
<div class="alert alert-danger" role="alert">
    {{ session('error') }}
</div>
@endif
@if (session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif







<!--===================================================================================================================================================-->
<!--#*********************************************************Start Page content here*****************************************************************#-->  
<!--===================================================================================================================================================-->
<!-- page content  Start Here -->

    <!-- Details Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="row">
                
               
            </div><!-- row-->
        </div>
        <!---card body ---->
    </div>
    <!-- Details Area End Here -->  

 <!-- page content  End Here -->
 <!--===================================================================================================================================================-->
<!--#*********************************************************End Page content here*****************************************************************#-->
<!--===================================================================================================================================================-->


<!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
@endsection

--}}