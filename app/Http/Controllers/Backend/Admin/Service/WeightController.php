<?php

namespace App\Http\Controllers\Backend\Admin\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\Admin\Weight;
use Validator;
use Session;

class WeightController extends Controller
{
     
    public function index()
    {
        $data['weights'] = Weight::get();
        return view('backend.admin.weights.view',$data);
    }
 
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
         $weight = New Weight();
         $weight->name = $request->name;
         $weight->calculation = $request->calculation;

         $weight->save();

         $notification = array(
                'message' => 'Successfully add weight!',
                'alert-type' => 'success'
        );

        return redirect()->route('weight.index')->with($notification);
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
        $weight =  Weight::find($id)->delete();
        $notification = array(
                'message' => 'Successfully add weight!',
                'alert-type' => 'success'
        );

        return redirect()->route('weight.index')->with($notification);
    }
}
