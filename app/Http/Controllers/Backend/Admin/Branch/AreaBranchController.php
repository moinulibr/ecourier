<?php

namespace App\Http\Controllers\Backend\Admin\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\Branch\Branch;
use App\Model\Backend\Branch\Area_branch;
use App\Model\Backend\Area\Area;
use Validator;
use Session;
use Auth;

class AreaBranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data['areabranches'] = Area_branch::where('branch_id',$id)->get();
        return view('backend.admin.branch.branch_setting',$data);
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
        $findarea = Area::find($request->area_id);

        $areabranch = New Area_branch();
        $areabranch->area_id = $request->area_id;
        $areabranch->district_id = $findarea->district_id;
        $areabranch->branch_id = $request->branch_id;
        $areabranch->status = 1;
        $areabranch->is_active = 1;
        $areabranch->is_verified = 1;
        $areabranch->created_by = 1;
        $areabranch->save();

        $notification = array(
                'message' => 'Branch Area create Successfully!',
                'alert-type' => 'success'
            );

        return redirect()->back()->with($notification);

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
        $findarea = Area::find($request->area_id);

        $areabranch = Area_branch::find($id);
        $areabranch->area_id = $request->area_id;
        $areabranch->district_id = $findarea->district_id;
        $areabranch->branch_id = $request->branch_id;
        $areabranch->status = 1;
        $areabranch->is_active = 1;
        $areabranch->is_verified = 1;
        $areabranch->created_by = 1;
        $areabranch->save();

        $notification = array(
                'message' => 'Branch Area create Successfully!',
                'alert-type' => 'success'
            );

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Area_branch::find($id)->delete();

        $notification = array(
                'message' => 'Branch Area create Successfully!',
                'alert-type' => 'success'
            );

        return redirect()->back()->with($notification);
    }
}
