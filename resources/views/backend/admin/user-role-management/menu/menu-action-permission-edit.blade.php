
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
                              {{menuModuleRouteURLAssignedPermissionUpdate_HP}}
                            </h1>
                        <!---------------------Page Title------------------->
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                 <a href="{{ route('admin.role-menu-action-permition.index') }}">
                                    {{menuModuleRouteURLActionPermissionAssignedList_HP}}
                                </a>
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
                                        <h5>{{menuModuleRouteURLAssignedPermissionUpdate_HP}}</h5>
                                    </div>
                                </div>
                                <form method="POST" action="{{route('admin.role-menu-action-permition.update',$user_role->id)}}" class="new-added-form form-inline">
                                    @csrf
                                    @method("PUT")
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-12 form-group" style="margin-bottom:5%;">
                                            <label for="role_id" class="col-xl-4 col-lg-4 col-12">User Role:</label>
                                            <input readonly value="{{ $user_role->name }}" type="text" class="col-xl-8 col-lg-8 col-12 form-control">
                                            <input name="role_id" value="{{ $user_role->id }}" type="hidden" class="col-xl-8 col-lg-8 col-12 form-control">
                                            
                                            @if($errors->has('role_id'))
                                            <span class="margin-left-33">
                                            <strong style="color:red;">{{ $errors->first('role_id') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        



                                
                                        <div class="col-xl-12 col-lg-12 col-12 form-group">
                                            @foreach ($all_menu_titles as $key=> $allTitle)
                                                <label class="col-xl-12 col-lg-12 col-12" style="text-align: center;margin-bottom:2%;border-top:.05px solid #ddd">
                                                    
                                                    <input  type="checkbox" value="{{$key}}" class="col-xl-2 col-lg-2 col-12 form-control parentClickClass">
                                                    <strong style="margin-bottom:2%;border-bottom:1px solid gray;color:green;font-size:17px;margin-top: 2%;">
                                                        {{ $allTitle->menu_title }}
                                                    </strong>
                                                </label>

                                                @foreach ($allTitle->menuTitleUseMenePermission as $item)
                                                <div class="col-xl-12 col-lg-12 col-12 form-group" style="margin-bottom:1%;">
                                                    <label for="" class="col-xl-3 col-lg-3 col-12"></label>
                                                    <input name="user_role_menu_action_id[]" value="{{ $item->id }}" @foreach($user_role->menuActionPermission as $userChecked) {{ $userChecked->user_role_menu_action_id == $item->id?'checked':'' }} @endforeach type="checkbox" class="col-xl-2 col-lg-2 col-12 form-control clickable childButtonSelected-{{$key}}">
                                                    <label for="" class="col-xl-5 col-lg-5 col-12"><strong>{{ $item->action_name }}</strong></label>
                                                </div>
                                                @endforeach

                                            @endforeach
                                        </div>
                                        <div class="form-group col-12 mg-t-8" style="margin-top:5%;">
                                            <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Update Permission</button>
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



<!--- push some things from here--->
<!----custom js link here----->
@push('js')
<!-- jquery-->
<script>
    $(".parentClickClass").click(function () {
        var allClassSelectdId = $(this).val();
        if (this.checked == false)
        {
                //console.log('unchecked');
                 $(".childButtonSelected-" + allClassSelectdId).each(function () { 
                        this.checked = false; 
                    }); 
        }else{
           $(".childButtonSelected-" + allClassSelectdId).each(function () { 
                        this.checked = true; 
                    }); 
            //console.log('checked');
        }
    });
 </script>


  <script>
   //checkAll('parentClickClass');
            /*if (this.checked == false)
            {
                    console.log('unchecked');
                    $(".childButtonSelected-" + allClassSelectdId).each(function () { 
                        if (this.checked == true) 
                            this.checked = false; 
                        else 
                            this.checked = true; 
                        }); 
            }else{
                console.log('checked');
            }
            
            console.log(allClassSelectdId);
                    $(".childButtonSelected-" + allClassSelectdId).each(function () { 
                    if (this.checked == true) 
                        this.checked = false; 
                    else 
                        this.checked = true; 
                }); 
    function checkAll(class_name) {
        $("." + class_name).each(function () { 
            if (this.checked == true) 
                this.checked = false; 
            else 
                this.checked = true; 
        }); */
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





{{--
@extends('backend.layouts.master')
@section('title','Add New Role')
@section('content')
<!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
<!---#############################################-->
<!--- push some things from here--->
    <!----for title---->
    @push('title')
       Menu Action Permission Update
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
@endsection

--}}