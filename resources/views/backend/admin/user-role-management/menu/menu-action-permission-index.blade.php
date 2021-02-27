
@extends('backend.layouts.master')
@section('title','Add New Role')
@section('content')

    
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
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

            <!---------------------------Top Page Title------------------->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        <!---------------------Page Title------------------->
                            <h1 class="m-0 text-dark">
                              {{menuModuleRouteURLActionPermissionList_HP}}
                            </h1>
                        <!---------------------Page Title------------------->
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                  <a href="{{ route('admin.role-menu-action-permition.create') }}">{{menuModuleRouteURLPermissionCreate_HP}}</a>
                                </li>
                                {{--  <li class="breadcrumb-item active"></li>  --}}
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

                        <div class="col-12">
                            <div class="card height-auto mg-t-30">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h5>{{menuModuleRouteURLActionPermissionAssignedList_HP}}</h5>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                <div class="row">
                                    @foreach ($roles as $item)
                                    <div class="col-2">
                                        <h5 style="text-align: right;margin-top:5%; vertical-align: middle;color:sienna;"> {{ $item->name }} :</h5>
                                    </div>
                                    <div class="col-8"  style="border-bottom:.5px solid #f0e9e9;">
                                        <div class="row">
                                            @foreach ($item->menuActionPermission as $value)
                                            <div class="col-3" style="margin-bottom:2%;margin-top:2%;">
                                                <strong style="color:sienna;">
                                                    {{$loop->index+1}}. 
                                                </strong>
                                                <strong style="color:green;">
                                                    {{ $value->menuAction->action_name }}   
                                                </strong>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-2"> 
                                        
                                        <a class="btn btn-primary" href="{{ route('admin.role-menu-action-permition.edit',$item->id) }}"><i class="fas fa-edit text-orange-peel"></i>Edit</a>
                                                        
                                        <a class="btn btn-danger delete" href="#" data-url="{{route('admin.role-menu-action-permition.delete',$item->id)}}"   data-toggle="modal" data-target="#myModal"><i class="fas fa-times" style="color:yellow"></i>Delete</a>
                                    </div>
                                    @endforeach
                                </div>
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



 <!-- The Modal -->
 <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content modal-sm">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" style="text-align:center">Delete This Menu Permission</h4>
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



<!--- push some things from here--->
<!----custom js link here----->
@push('js')
<!-- jquery-->

 
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









{{--
@extends('backend.layouts.master')
@section('title','Add New Role')
@section('content')
<!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
<!---#############################################-->
<!--- push some things from here--->
    <!----for title---->
    @push('title')
       Menu Action Permission
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
                    <li>Admin</li>
                    <li>
                      
                    </li>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
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

<div class="card height-auto">
    <div class="card-body">
        <div class="row">
           
        </div><!-- row-->
    </div>
    <!---card body ---->
</div>
 <!-- page content  End Here -->
 <!--===================================================================================================================================================-->
<!--#*********************************************************End Page content here*****************************************************************#-->
<!--===================================================================================================================================================-->

<!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
@endsection

--}}