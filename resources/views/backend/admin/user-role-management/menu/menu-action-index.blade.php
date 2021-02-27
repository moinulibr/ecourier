
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
                              {{menuModuleRouteURLActionIndex_HP}} 
                            </h1>
                        <!---------------------Page Title------------------->
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                 <a href="{{route('admin.user-role-menu-action.create')}}" class="btn-fill-lg bg-blue-dark btn-hover-yellow"><i class="fas fa-plus"></i> 
                                    Add {{menuModuleCreateAction_HP}}
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
                                        <th>{{menuModuleRouteURLActionName_HP}}</th>
                                        <th>{{menuModuleRouteURLActionChecker_HP}} <small style="color:red;">(only route, url)</small></th>
                                        <th>{{menuModuleTitleName_HP}}</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menu_actions as $item)
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input">
                                                <label class="form-check-label">#{{ $loop->index + 1}}</label>
                                            </div>
                                        </td>
                                        <td>{{ ucfirst($item->action_name) }}</td>
                                        
                                        <td>
                                            <span style="color:green;">
                                            {{ $item->action_checker_route_or_url }}
                                            </span>
                                        </td>
                                        <td>
                                            {{$item->menu_action?$item->menu_action->menu_title:'' }}
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <span class="flaticon-more-button-of-three-dots"></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    
                                                    <a class="dropdown-item" href="{{route('admin.user-role-menu-action.edit',$item->id)}}"><i class="fas fa-edit text-orange-peel"></i>Edit</a>
                                                
                                                    <a class="dropdown-item delete" href="#" data-toggle="modal" data-url="{{route('admin.user-role-menu-action.delete',$item->id)}}"  data-toggle="modal" data-target="#myModal"><i class="fas fa-times text-orange-red"></i>Delete</a>
                                                
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $menu_actions->links() }}
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
          <h4 class="modal-title" style="text-align:center">Delete This Role Menu</h4>
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
        Role Menu Action
    @endpush
    <!----for title---->
<!--@@@@@@@@@@@@@-->
<!----custom css link here----->
   @push('css')
    
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
            <h3>Menu Action </h3>
        </div>
        <div class="col-sm-12 col-md-8">
            <div style="float:right">
                <ul>
                    <li>Menu Action </li>
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




<!--#*********************************************************Start Page content here*****************************************************************#-->  
<!-- page content  Start Here -->


    <!-- Teacher Table Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3></h3>
                </div>
                  
            </div>
           
           
        </div>
    </div>
    <!-- Teacher Table Area End Here -->

 <!-- page content  End Here -->
<!--#*********************************************************End Page content here*****************************************************************#-->

  
<!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
@endsection

--}}