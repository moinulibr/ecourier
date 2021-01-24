<?php

namespace App\Http\Controllers\Backend\Admin\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\Admin\Service\Service_type;
use Auth;
use Session;
use Validator;

class ServiceTypeController extends Controller
{
     
    public function index()
    {
        $data['service_typies'] = Service_type::all();
         return view('backend.admin.service.Service_type',$data);
    }

    
    public function create()
    {
        
    }

     
    public function store(Request $request)
    {
        
    }

     
    public function show($id)
    {
         
    }

     
    public function edit($id)
    {
        
    }

     
    public function update(Request $request, $id)
    {
         
    }

     
    public function destroy($id)
    {
         
    }
}
