
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
                                Module Action Permission
                            </h1>
                        <!---------------------Page Title------------------->
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                               <a href="{{ route('admin.role-module-action-permition.index') }}">Permission Index</a>
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

                        <div class="col-12">
                            <div class="card height-auto mg-t-30">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h5>Add Module Action Permission</h5>
                                    </div>
                                </div>
                                <form method="POST" action="{{route('admin.role-module-action-permition.store')}}" class="new-added-form form-inline">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-12 form-group" style="margin-bottom:5%;">
                                            <label for="role_id" class="col-xl-4 col-lg-4 col-12">User Role:</label>
                                            <select name="role_id" id="role_id" class="col-xl-8 col-lg-8 col-12 form-control">
                                                <option value="">Select One</option>
                                                @foreach ($user_roles as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option> 
                                                @endforeach
                                            </select>
                                            @if($errors->has('role_id'))
                                            <span class="margin-left-33">
                                            <strong style="color:red;">{{ $errors->first('role_id') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        



                                    
                                        <div class="col-xl-12 col-lg-12 col-12 form-group">
                                            @foreach ($all_modules as $allTitle)

                                                <label class="col-xl-12 col-lg-12 col-12" style="text-align: center;margin-bottom:2%;border-top:.05px solid #ddd"><strong style="margin-bottom:2%;border-bottom:1px solid gray;color:green;font-size:17px;">{{ $allTitle->module_name }}</strong></label>

                                                @foreach ($allTitle->userModuleAction as $item)
                                                <div class="col-xl-12 col-lg-12 col-12 form-group">
                                                    <label for="" class="col-xl-3 col-lg-3 col-12"></label>
                                                    <input name="user_role_module_action_id[]" value="{{ $item->id }}" {{ old('user_role_module_action_id') == $item->id?'checked':'' }} type="checkbox" class="col-xl-2 col-lg-2 col-12 form-control clickable">
                                                    <label for="" class="col-xl-5 col-lg-5 col-12"><strong>{{ $item->action_name }}</strong></label>
                                                </div>
                                                @endforeach

                                            @endforeach
                                        </div>
                                        <div class="form-group col-12 mg-t-8" style="margin-top:5%;">
                                            <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Add Permission</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        
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
          <h4 class="modal-title" style="text-align:center">Delete This Account</h4>
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
       Module Action Permission Create
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
    .clickable{
        cursor: pointer;
        text-align: right;
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
            
            
        </div>
    </div>
</div>

 <!-- page content  End Here -->
 <!--===================================================================================================================================================-->
<!--#*********************************************************End Page content here*****************************************************************#-->
<!--===================================================================================================================================================-->



<!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->

<!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
@endsection

---}}