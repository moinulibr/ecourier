@extends('backend.layouts.master')
@section('title','Add New Role')
@section('content')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">


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


                    

                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">
                                {{parentMenuLabel_HP}}
                            </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.role-menu-title.index') }}"></a>
                                </li>
                                {{--  <li class="breadcrumb-item active"></li>  --}}
                            </ol>
                        </div>
                    </div>
                </div>
            </div>




            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!--Need Card-->
                    <div class="row">
                         
                <div class="col-6">
                    <div class="card height-auto mg-t-30">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h5>Add {{parentMenuLabel_HP}}</h5>
                            </div>
                        </div>
                            <form method="POST" action="{{route('admin.role-menu-title.store')}}" class="new-added-form form-inline">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-12 form-group">
                                        <label class="col-xl-4 col-lg-4 col-12">Menu Name:</label>
                                        <input name="menu_title" type="text" value="{{old('menu_title')}}" placeholder="Menu Title" class="col-xl-8 col-lg-8 col-12 form-control">
                                        @if($errors->has('menu_title'))
                                        <span class="margin-left-33">
                                        <strong style="color:red;">{{ $errors->first('menu_title') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-12 form-group" style="margin-top:1%;">
                                        <label class="col-xl-4 col-lg-4 col-12">{{parentMenuCheckerLabel_HP}}:</label>
                                        <input name="menu_title_checker_route_or_url" type="text" value="{{old('menu_title_checker_route_or_url')}}" placeholder="Menu Title Checker, (unique)" class="col-xl-8 col-lg-8 col-12 form-control">
                                        @if($errors->has('menu_title_checker_route_or_url'))
                                        <span class="margin-left-33">
                                        <strong style="color:red;">{{ $errors->first('menu_title_checker_route_or_url') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-12 form-group">
                                        <label class="col-xl-4 col-lg-4 col-12">Type</label>

                                            <input type="radio" id="menu" name="menu_module_type" value="1" class="form-control"style="margin-right:1%;">
                                            <label for="menu" style="margin-right:2%;">Menu</label>
                                            <input type="radio" id="module" name="menu_module_type" value="2" class="form-control"style="margin-right:1%;">
                                            <label for="module" style="margin-right:2%;">Module</label>
                                            <input type="radio" id="menu_module" name="menu_module_type" value="3" checked class="form-control"style="margin-right:1%;">
                                            <label for="menu_module">Menu & Module</label>

                                        @if($errors->has('menu_module'))
                                        <span class="margin-left-33">
                                        <strong style="color:red;">{{ $errors->first('menu_module') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group col-12 mg-t-8">
                                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Add {{parentMenuSubmitLabel_HP}}</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card height-auto mg-t-30">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h5>View {{parentMenuLabel_HP}}</h5>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table display  text-nowrap">
                                <thead>
                                    <tr>
                                        <th>
                                            Sl.
                                        </th>
                                        <th>{{parentMenuLabel_HP}}</th>
                                        <th>{{parentMenuCheckerLabel_HP}}</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $item) 
                                    <tr>
                                        <td>
                                            <label class="form-check-label">#{{$loop->index +1}}</label>
                                        </td>
                                        <td>{{$item->menu_title}}</td>
                                        <td>
                                            <strong style="color:green;"> 
                                            @if($item->menu_module_type == 1)
                                                {{menuModuleTypeMenu}}
                                            @elseif($item->menu_module_type == 2)
                                                {{menuModuleTypeModule}}
                                            @else
                                            {{menuModuleTypeMenuAndModule}}
                                            @endif
                                            </strong>
                                           ({{$item->menu_title_checker_route_or_url}})
                                        </td>
                                        <td>
                                           <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                   <span class="flaticon-more-button-of-three-dots"></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                               
                                                    <a class="dropdown-item edit" href="#"  data-checker="{{ $item->menu_title_checker_route_or_url }}" data-menu-module-type="{{ $item->menu_module_type }}" data-name="{{ $item->menu_title }}" data-url="{{route('admin.role-menu-title.update',$item->id)}}"    data-toggle="modal" data-target="#myEditModal">
                                                        <i class="fas fa-edit text-orange-peel"></i>Edit
                                                    </a>
                                               
                                               
                                                    <a class="dropdown-item delete" href="#" data-url="{{route('admin.role-menu-title.delete',$item->id)}}"   data-toggle="modal" data-target="#myModal"><i class="fas fa-times text-orange-red"></i>Delete</a>
                                                
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
                    </div>
                </div>
            </section>



        </div>




  <!-- The Delete  Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content modal-sm">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" style="text-align:center">Delete This {{parentMenuLabel_HP}}</h4>
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
            <h4 class="modal-title" style="text-align:center">Edit This {{parentMenuLabel_HP}}</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
            
                <div class="col-xl-12 col-lg-12 col-12 form-group">
                    <label class="col-xl-12 col-lg-12 col-12"> {{parentMenuLabel_HP}}:</label>
                    <input name="menu_title" id="name" type="text" value=""  class="col-xl-12 col-lg-12 col-12 form-control">
                    @if($errors->has('menu_title'))
                    <span class="margin-left-33">
                    <strong style="color:red;">{{ $errors->first('menu_title') }}</strong>
                    </span>
                    @endif
                </div>
            
                <div class="col-xl-12 col-lg-12 col-12 form-group">
                    <label class="col-xl-12 col-lg-12 col-12"> {{parentMenuCheckerLabel_HP}}:</label>
                    <input name="menu_title_checker_route_or_url" id="checker" type="text" value="" class="col-xl-12 col-lg-12 col-12 form-control">
                    @if($errors->has('menu_title_checker_route_or_url'))
                    <span class="margin-left-33">
                    <strong style="color:red;">{{ $errors->first('menu_title_checker_route_or_url') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="col-xl-12 col-lg-12 col-12 form-group">
                        <div class="row">
                            <label class="col-xl-3 col-lg-3 col-12">Type</label>
                            <input type="radio" id="menu_edit" name="menu_module_type" value="1" class="form-control menu_module_type"style="margin-right:1%;width: 20px;">
                            <label for="menu" style="margin-right:2%;margin-top: 2%;">Menu</label>
                            <input type="radio" id="module_edit" name="menu_module_type" value="2" class="form-control menu_module_type"style="margin-right:1%;width: 20px;">
                            <label for="module" style="margin-right:2%;margin-top: 2%;">Module</label>
                            <input type="radio" id="menu_module_edit" name="menu_module_type" value="3"  class="form-control menu_module_type"style="margin-right:1%;width: 20px;">
                            <label for="menu_module"style="margin-top: 2%;">Menu & Module</label>
                        </div>

                    @if($errors->has('menu_module'))
                    <span class="margin-left-33">
                    <strong style="color:red;">{{ $errors->first('menu_module') }}</strong>
                    </span>
                    @endif
                </div>
            
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
            <input type="submit" class="btn btn-info" value="Update">
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
        let checker  = $(this).data('checker');
        let menu_module_type  = $(this).data('menu-module-type');

        $('#name').val(name);
        $('#checker').val(checker);
        if(menu_module_type == 1)
        {
            $('#menu_edit').prop('checked',true).trigger("change");
        }
        else if(menu_module_type == 2)
        {
            $('#module_edit').prop('checked',true).trigger("change");
        }
        else if(menu_module_type == 3)
        {
            $('#menu_module_edit').prop('checked',true).trigger("change");
        }
        else{
            $('#menu_module_edit').prop('checked',true).trigger("change");
        }
        
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

