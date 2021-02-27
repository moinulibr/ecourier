@extends('backend.layouts.master')
@section('title','Area')
@section('content')
	<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Area List</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Area</a></li>
                        <li class="breadcrumb-item active">Area</li>
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
                    <h4 class="card-title">Area 
                       
                       <!-- Button trigger modal -->
                          <button type="button" class="btn btn-primary btn-xs float-right" data-toggle="modal" data-target="#new_area"> <i class="fa fa-plus"></i>
                            Add New
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="new_area" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <form action="{{ url('area/store') }}" method="post">
                                    @csrf
                               
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Add New Area</h4>
                                </div>
                                <div class="modal-body">
                                  


                                          <div class="form-group">
                                            <label for="" class="col-md-12">Division</label>
                                            <div class="col-md-12">
                                               <select name="division_id" id="division_id" class="form-control" required="">
                                                 <option value="">Select Division</option>
                                                  @foreach($divisions  as $division)
                                                  <option value="{{ $division->id }}">{{ $division->name }}</option>
                                                  @endforeach
                                               </select>
                                            </div>
                                         </div>  
                                          
                                         <div class="form-group">
                                            <label for="" class="col-md-12">District</label>
                                            <div class="col-md-12">
                                               <select name="district_id" id="district_id" class="form-control" required="">
                                                 <option value="">Select District</option>
                                                  
                                               </select>
                                            </div>
                                         </div>




                                         <div class="form-group">
                                            <label for="" class="col-md-12">Area Name English</label>
                                            <div class="col-md-12">
                                              <input type="text" class="form-control" name="area_eng" placeholder="Area Name English" required="">
                                            </div>
                                         </div>

                                         <div class="form-group">
                                            <label for="" class="col-md-12">Area Name Bangla</label>
                                            <div class="col-md-12">
                                              <input type="text" class="form-control" name="area_bn" placeholder="Area Name Bangla" required="">
                                            </div>
                                         </div> 


                                         <div class="form-group">
                                            <label for="" class="col-md-12">Sevice City Type</label>
                                            <div class="col-md-12">
                                               <select name="service_city_type_id" id="" class="form-control" required="">
                                                 <option value="">Select Type</option>
                                                  @foreach($service_city_typies as $type)
                                                  <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                  @endforeach
                                               </select>
                                            </div>
                                         </div>
                                  
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                              </form>
                              </div>
                            </div>
                          </div>

                    </h4>
                    
                    <hr>
                    <table id="datatable-buttons" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Division</th>
                                <th>District</th>
                                <th>English Name</th>
                                <th>Bangla Name</th>
                                <th>City Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                              @foreach($areas as $area)
                               <tr>
                                   <td>{{ $loop->iteration }}</td>
                                   <td>{{ $area->division->name }}</td>
                                   <td>{{ $area->district->name }}</td>
                                   <td>{{ $area->area_name }}</td>
                                   <td>{{ $area->area_name_bn }}</td>
                                   <td>
                                     {{ $area->citytype->name  }}
                                   </td>
                                   <td>
                                       
                                       <a href="{{ url('area/destroy',$area->id) }}" class="btn btn-danger btn-sm" id="delete"> <i class="fa fa-trash"></i> Delete</a>



    <!-- Button trigger modal -->
                          <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#new_area_{{ $area->id }}"> <i class="fa fa-edit"></i>
                           Edit
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="new_area_{{ $area->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <form action="{{ url('area/update',$area->id) }}" method="post">
                                    @csrf
                               
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Add New Area</h4>
                                </div>
                                <div class="modal-body">
                                  


                                          <div class="form-group">
                                            <label for="" class="col-md-12">Division</label>
                                            <div class="col-md-12">
                                               <select name="division_id" id="division_id" class="form-control" required="">
                                                 <option value="">Select Division</option>
                                                  @foreach($divisions  as $division)
                                                  <option {{ $area->division_id = $division->id ? 'selected' : '' }} value="{{ $division->id }}">{{ $division->name }}</option>
                                                  @endforeach
                                               </select>
                                            </div>
                                         </div>  
                                          
                                         <div class="form-group">
                                            <label for="" class="col-md-12">District</label>
                                            <div class="col-md-12">
                                               <select name="district_id" id="district_id" class="form-control" required="">
                                                 <option value="">Select District</option>
                                                  @foreach($districts as $district)
                                                  <option {{ $district->id == $area->district_id ? 'selected' : '' }} value="{{ $district->id }}">{{ $district->name }}</option>
                                                  @endforeach
                                               </select>
                                            </div>
                                         </div>




                                         <div class="form-group">
                                            <label for="" class="col-md-12">Area Name English</label>
                                            <div class="col-md-12">
                                              <input type="text" class="form-control" name="area_eng" value="{{ $area->area_name }}" placeholder="Area Name English" required="">
                                            </div>
                                         </div>

                                         <div class="form-group">
                                            <label for="" class="col-md-12">Area Name Bangla</label>
                                            <div class="col-md-12">
                                              <input type="text" class="form-control" name="area_bn" value="{{ $area->area_name_bn }}" placeholder="Area Name Bangla" required="">
                                            </div>
                                         </div> 


                                         <div class="form-group">
                                            <label for="" class="col-md-12">Sevice City Type</label>
                                            <div class="col-md-12">
                                               <select name="service_city_type_id" id="" class="form-control" required="">
                                                 <option value="">Select Type</option>
                                                  @foreach($service_city_typies as $type)
                                                  <option {{ $area->service_city_type_id == $type->id ? 'selected' : '' }} value="{{ $type->id }}">{{ $type->name }}</option>
                                                  @endforeach
                                               </select>
                                            </div>
                                         </div>
                                  
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Save Update</button>
                                </div>
                              </form>
                              </div>
                            </div>
                          </div>





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




<div id="getDistrict" data-url="{{ url('getDivisionAjax')}}"></div> 


@section('ajaxdropdown')


  <script>

        $('#division_id').on('change', function(){
           var division_id =  $(this).val();

           var url = $('#getDistrict').data("url");
          
           $.ajax({
              url: url,
              data: {division_id:division_id},
              type: "GET",
              success: function(response){
                $('#district_id').html(response);
              },  
           });
        });


</script>

    
@endsection
@endsection