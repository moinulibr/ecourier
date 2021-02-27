<?php

namespace App\Http\Controllers\Backend\Admin\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\Branch\Branch;
use App\Model\Backend\Branch\Branch_type;
use App\Model\Backend\Branch\Area_branch;
use App\Model\Backend\Area\Division;
use App\Model\Backend\Area\District;
use App\Model\Backend\Area\Area;
use Validator;
use Session;
use Auth;
use App\Model\Backend\Commission\Branch_commission;
use App\Model\Backend\Commission\Branch_commission_setting;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['branches'] = Branch::get();
        $data['branchtypes'] = Branch_type::all();
        $data['districts'] = District::all();
        return view('backend.admin.branch.view',$data);
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
        $branch = New Branch();
        $branch->company_name   = $request->name;
        $branch->branch_type_id = $request->branch_type_id;
        $branch->parent_id      = $request->parent_id;
        $branch->district_id    = $findarea->district_id;
        $branch->area_id        = $request->area_id;
        $branch->status = 1;
        $branch->is_active = 1;
        $branch->created_by = Auth::user()->id;

        $branch->save();

         $notification = array(
                'message' => 'New Branch create Successfully!',
                'alert-type' => 'success'
            );

        return redirect()->route('branch.index')->with($notification);

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
        $branch = Branch::find($id);
        $branch->company_name   = $request->name;
        $branch->branch_type_id = $request->branch_type_id;
        $branch->parent_id      = $request->parent_id;
        $branch->district_id    = $findarea->district_id;
        $branch->area_id        = $request->area_id;
        $branch->status = 1;
        $branch->is_active = 1;
        $branch->created_by = Auth::user()->id;

        $branch->save();

        $notification = array(
                'message' => 'Branch update Successfully!',
                'alert-type' => 'success'
            );

        return redirect()->route('branch.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Branch::find($id)->delete();

        $notification = array(
                'message' => 'Branch update Successfully!',
                'alert-type' => 'success'
            );

        return redirect()->route('branch.index')->with($notification);

    }




    public function branchsetting($id)
    {
        $data['branches'] = Branch::get();
        $data['branchtypes'] = Branch_type::all();
        $data['districts'] = District::all();

        $data['areabranchcount'] = Area_branch::where('branch_id',$id)->count();
        $data['areabranches'] = Area_branch::where('branch_id',$id)->get();

        $data['branchcommissionscount'] = Branch_commission_setting::where('branch_id',$id)->count();
        $data['branchcommissions'] = Branch_commission_setting::where('branch_id',$id)->first();



        return view('backend.admin.branch.branch_setting',$data);
    }



    public function commissionsetting(Request $request)
    {
        $findbranchtype = Branch::find($request->branch_id);


        $commissionsetting = Branch_commission_setting::firstOrCreate(['branch_id'=>$request->branch_id]);

        $commissionsetting->branch_type_id                     = $findbranchtype->branch_type_id;
        $commissionsetting->create_and_pick_commission_type_id = $request->create_and_pick_commission_type_id;
        $commissionsetting->create_and_pick_commission_amount  = $request->create_and_pick_commission_amount;
        $commissionsetting->create_pick_and_delivery_commision_type_id= $request->create_pick_and_delivery_commision_type_id;
        $commissionsetting->create_pick_and_delivery_commision_amount= $request->create_pick_and_delivery_commision_amount;
        $commissionsetting->receive_and_delivery_commision_type_id= $request->receive_and_delivery_commision_type_id;
        $commissionsetting->receive_and_delivery_commision_amount= $request->receive_and_delivery_commision_amount;
        $commissionsetting->receive_as_media_commision_type_id = $request->receive_as_media_commision_type_id;
        $commissionsetting->receive_as_media_commision_amount  = $request->receive_as_media_commision_amount;
        $commissionsetting->sending_as_media_commision_type_id = $request->sending_as_media_commision_type_id;
        $commissionsetting->sending_as_media_commision_amount  = $request->sending_as_media_commision_amount;
        $commissionsetting->status                             = $request->status;

        $commissionsetting->save();

         $notification = array(
                'message' => 'Branch update Successfully!',
                'alert-type' => 'success'
            );

        return redirect()->route('branch.index')->with($notification);






    }















}
