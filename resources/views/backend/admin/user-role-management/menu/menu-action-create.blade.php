
@extends('backend.layouts.master')
@section('title','Add New Role')
@section('content')

<!----custom css link here----->
   @push('css')

   <style>
       .margin-left-33{
        margin-left:33%;
       }

       .margin-top-33{
            margin-top:1%;
       }
   </style>
   @endpush
<!----custom css link here----->

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

    
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!---------------------Top Page Title------------------->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        <!---------------------Page Title------------------->
                            <h1 class="m-0 text-dark">
                               Add {{menuModuleRouteURLActionCreateTitle_HP}}
                            </h1>
                        <!---------------------Page Title------------------->
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                <a href="{{ route('admin.user-role-menu-action.index') }}">{{menuModuleRouteURLActionIndexToList_HP}}</a>
                                </li>
                               {{--   <li class="breadcrumb-item active"></li>  --}}
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!---------------------Top Page Title------------------->



            <!---------------------Main content Start here--------------->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!--Need Card-->
                    <!---------row------ ---->
                    <div class="row"><!---row ---->

                      <div class="col-xl-12 col-lg-12 col-12">

                            <form action="{{ route('admin.user-role-menu-action.store') }}" method="POST" class="new-added-form form-inline">
                                @csrf
                                    
                                <div class="col-xl-12 col-lg-12 col-12 form-group margin-top-33">
                                    <label class="col-xl-4 col-lg-4 col-12 "  style="text-align:right;">{{menuModuleTitleName_HP}}:</label>
                                    <select name="user_role_menu_title_id" id="user_role_menu_title_id" class="col-xl-8 col-lg-8 col-12 form-control">
                                        <option value="">Select One</option>
                                        @foreach ($menu_titles as $item)
                                            <option {{ old('user_role_menu_title_id') == $item->id ?'selected':''}} value="{{$item->id}}">{{$item->menu_title}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('user_role_menu_title_id'))
                                    <span class="margin-left-33">
                                    <strong style="color:red;">{{ $errors->first('user_role_menu_title_id') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-xl-12 col-lg-12 col-12 form-group margin-top-33">
                                    <label class="col-xl-4 col-lg-4 col-12" for="action_name"  style="text-align:right;">{{menuModuleRouteURLActionName_HP}}:</label>
                                    <input type="text" value="{{old('action_name')}}" id="action_name" placeholder="{{menuModuleRouteURLActionName_HP}}" name="action_name" class="col-xl-8 col-lg-8 col-12 form-control">
                                    @if($errors->has('action_name'))
                                    <span class="margin-left-33">
                                    <strong style="color:red;">{{ $errors->first('action_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-12 col-12 form-group margin-top-33">
                                    <label for="action_checker_route_or_url" class="col-xl-4 col-lg-4 col-12">{{menuModuleRouteURLActionChecker_HP}}: <small style="color:red;">(only route / url)</small></label>
                                    <input name="action_checker_route_or_url" id="action_checker_route_or_url" value="{{old('action_checker_route_or_url')}}" type="text" placeholder="Action Checker (must use url,route)" class="col-xl-8 col-lg-8 col-12 form-control">
                                    @if ($errors->has('action_checker_route_or_url'))
                                    <span  role="alert" class="margin-left-33">
                                    <strong style="color:red;">{{ $errors->first('action_checker_route_or_url') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-12 margin-top-33">
                                    <button type="submit" class="btn btn-md btn-info">Add {{menuModuleRouteURLActionCreateSubmit_HP}}</button>
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

<script>
    $(document).ready(function(){
       
    });
</script>
@endpush
<!----custom js link here----->
@endsection
