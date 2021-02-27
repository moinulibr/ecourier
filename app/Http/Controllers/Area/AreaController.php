<?php

namespace App\Http\Controllers\Area;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\Area\Division;
use App\Model\Backend\Area\District;
use App\Model\Backend\Area\Area;
use App\Model\Backend\Admin\Service\Service_city_type;
use Validator;
use Auth;
use Session;
use Carbon\Carbon;


class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data['divisions'] = Division::all();
       $data['districts'] = District::all();
       $data['areas'] = Area::all();
       $data['service_city_typies'] = Service_city_type::all();


        return view('backend.admin.area.area.view',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validators =  Validator::make($request->all(),[
                 'division_id' => 'required',
                 'district_id' => 'required',
                 'area_eng' => 'required',
                 'area_bn' => 'required',
                 'service_city_type_id' => 'required',

        ]);
        if($validators->fails()){
            return redirect()->back()->withErrors($validators)->withInput();
        }
        else{

                $area = new Area();
                $area->area_name = $request->area_eng;
                $area->area_name_bn = $request->area_bn;
                $area->service_city_type_id = $request->service_city_type_id;
                $area->district_id = $request->district_id;
                $area->division_id = $request->division_id;
                $area->save();

                $notification = array(
                    'message' => 'Successfully Area Add!',
                    'alert-type' => 'success'
                );

                return redirect('area/view')->with($notification);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validators =  Validator::make($request->all(),[
                 'division_id' => 'required',
                 'district_id' => 'required',
                 'area_eng' => 'required',
                 'area_bn' => 'required',
                 'service_city_type_id' => 'required',

        ]);
        if($validators->fails()){
            return redirect()->back()->withErrors($validators)->withInput();
        }
        else{

                $area = Area::find($id);

                $area->area_name = $request->area_eng;
                $area->area_name_bn = $request->area_bn;
                $area->service_city_type_id = $request->service_city_type_id;
                $area->district_id = $request->district_id;
                $area->division_id = $request->division_id;
                $area->save();

                $notification = array(
                    'message' => 'Successfully Area updated!',
                    'alert-type' => 'success'
                );

                return redirect('area/view')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            Area::find($id)->delete();
            
            $notification = array(
                'message' => 'Successfully Area deleted!',
                'alert-type' => 'success'
            );

            return redirect('area/view')->with($notification);

    }





    







}
