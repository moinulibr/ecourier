

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
                                Add Module Action   <small>(it only Button Check)</small>
                            </h1>
                        <!---------------------Page Title------------------->
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                <a href="{{ route('admin.role-menu-title.create') }}">Create Menu Action</a>
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

                        <form action="{{ route('admin.user-role-module-action.store') }}" method="POST" class="new-added-form form-inline">
                            @csrf
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-12 form-group">
                                        <label class="col-xl-4 col-lg-4 col-12">Module Name:</label>
                                        <select name="user_role_module_id" id="user_role_module_id" class="col-xl-8 col-lg-8 col-12 form-control">
                                            <option value="">Select One</option>
                                            @foreach ($modules as $item)
                                                <option {{ old('user_role_module_id') == $item->id ?'selected':''}} value="{{$item->id}}">{{$item->module_name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('user_role_module_id'))
                                        <span class="margin-left-33">
                                        <strong style="color:red;">{{ $errors->first('user_role_module_id') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-12 form-group not_cash">
                                        <label class="col-xl-4 col-lg-4 col-12" for="action_name">Module Action Name:</label>
                                        <input type="text" value="{{old('action_name')}}" id="action_name" placeholder="Role Module Action Name" name="action_name" class="col-xl-8 col-lg-8 col-12 form-control">
                                        @if($errors->has('action_name'))
                                        <span class="margin-left-33">
                                        <strong style="color:red;">{{ $errors->first('action_name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-12 form-group not_cash">
                                        <label for="action_checker_route_or_url" class="col-xl-4 col-lg-4 col-12">Action Checker: <small style="color:red;">(Unique*like,url/route/others)</small></label>
                                        <input name="action_checker_route_or_url" id="action_checker_route_or_url" value="{{old('action_checker_route_or_url')}}" type="text" placeholder="Action Checker Unique*like,url/route/others" class="col-xl-8 col-lg-8 col-12 form-control">
                                        @if ($errors->has('action_checker_route_or_url'))
                                        <span  role="alert" class="margin-left-33">
                                        <strong style="color:red;">{{ $errors->first('action_checker_route_or_url') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-12 mg-t-8">
                                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Add Module Action</button>
                                    </div>
                                </div>
                        </form>

                        
                    </div><!---row ---->
                    <!---------row------ ---->
                </div>
            </section>
            <!-- Main content -->
            <!---------------------Main content end here--------------->

        </div>
        <!-- Content Wrapper. Contains page content -->


<!--- push some things from here--->
<!----custom js link here----->
@push('js')

<script>
    $(document).ready(function(){
        
    });
</script>
@endpush
<!----custom js link here----->
<!--- push some things from here--->
@endsection














{{--  @extends('backend.layouts.master')
@section('title','Add New Role')
@section('content')
<!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
<!---#############################################-->
<!--- push some things from here--->
    <!----for title---->
    @push('title')
      Role Module Create
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
            <h3>Create Module Action</h3>
        </div>
        <div class="col-sm-12 col-md-8">
            <div style="float:right">
                <ul>
                    <li>Admin</li>
                    <li>
                        <a href="{{route('admin.user-role-module-action.index')}}">Module Action View</a>
                    </li>
                    <li>
                        <a href="{{route('home')}}">Home</a>
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



<!--#*********************************************************Start Page content here*****************************************************************#-->  
<!--===================================================================================================================================================-->
<!-- page content  Start Here -->

    <!-- Add Expense Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h5></h5>
                </div>
            </div>
       
        </div>
    </div>
    <!-- Add Expense Area End Here -->

 <!-- page content  End Here -->
 <!--===================================================================================================================================================-->
<!--#*********************************************************End Page content here*****************************************************************#-->

  --}}

