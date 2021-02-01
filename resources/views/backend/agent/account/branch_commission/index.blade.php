@extends('backend.layouts.master')
@section('title','Total Current Balance')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0"> Total Commission Balance  <small>(Admin)</small></h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item active">Total Commission Balance</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

@if (session()->has('success'))
<div class="alert alert-success">
    @if(is_array(session('success')))
        <ul>
            @foreach (session('success') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    @else
        {{ session('success') }}
    @endif
</div>
@endif

@if (session()->has('error'))
<div class="alert alert-danger">
    @if(is_array(session('error')))
        <ul>
            @foreach (session('error') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    @else
        {{ session('error') }}
    @endif
</div>
@endif


    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-body">

                    <div class="row" >
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Total Due Commission</label>
                                <input type="text" disabled value="{{$total_amount}}" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Total Paid Commission</label>
                                <input type="text" disabled value="{{$total_paid_amount}}" class="form-control"/>
                            </div>
                        </div>

                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="table-responsive dt-responsive" id="">
                                    <table  class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                            
                                            </tr>
                                        </thead>
                                        <tbody >
                                           
                                        </tbody>
                                        <tfooter>
                                           {{--{{date('Y-m-d h:i:s',strtotime($item->created_at))}}   
                                           <tr>id="showResult"
                                                <td colspan="5"></td>
                                                <td >
                                                    <a href="#" id="clearAll" class="btn btn-sm btn-danger clearAll">Clear All</a>
                                                </td>
                                            </tr>  --}}
                                       </tfooter>
                                    </table>
                                </div>
                            </div>
                        </div>
        
                    </div>

                </div>
            </div>
        </div>
    </div>



@section('ajaxdropdown')

    

@endsection
@endsection
