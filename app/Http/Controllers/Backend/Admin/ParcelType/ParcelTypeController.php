<?php

namespace App\Http\Controllers\Backend\Admin\ParcelType;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\Admin\Parcel\Parcel_type;
use Validator;
use Session;

class ParcelTypeController extends Controller
{
    
    public function index()
    {
        $data['parcel_typies'] = Parcel_type::all();
        return view('backend.admin.parcels.parcel_type',$data);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

     
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

     
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
