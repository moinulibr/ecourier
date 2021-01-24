<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Backend\Area\Division;
use App\Model\Backend\Area\District;
use App\Model\Backend\Area\Area;
use App\Model\Backend\Merchant\Shop\Merchant_shop;
use App\Model\Backend\Merchant\Setting\Merchant_Setting;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('merchant');
        $this->middleware(['auth:web','official']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.layouts.partials.dashboard');
    }







      // ajax function

    public function getdistrictajax(Request $request){

      $districtHtmlOption = "<option value=''>Select District</option>";
      $divisionId = $request->division_id;
      // echo "This is ajax code success";
      $districts = District::where([['division_id', $divisionId]])->get();
      foreach ($districts as $district) {
        $districtHtmlOption .= "<option value='$district->id'>$district->name</option>";
      }
      // echo $cityHtmlOption;
      echo ($districtHtmlOption);
      // return ('MOINUL');
    }

    public function getthanaajax(Request $request){
      $thanaHtmlOption = "<option value=''>উপজেলা নির্বাচন করুন</option>";
      $districtId = $request->district;
      // echo "This is ajax code success";
      $thanas = Thana::where([['district_id', $districtId],['status',1]])->get();
      foreach ($thanas as $thana) {
        $thanaHtmlOption .= "<option value='$thana->id'>$thana->thana_name</option>";
      }
      // echo $cityHtmlOption;
      return ($thanaHtmlOption);
    }

    public function getunionajax(Request $request){
      $unionHtmlOption = "<option value=''> ইউনিয়ন নির্বাচন করুন</option>";
      $thanaId = $request->thana;
      // echo "This is ajax code success";

      $unions = Union::where([['thana_id', $thanaId],['status',1]])->get();
      foreach ($unions as $union) {
        $unionHtmlOption .= "<option value='$union->id'>$union->union_name</option>";
      }
      // echo $cityHtmlOption;
      return ($unionHtmlOption);
    }  









    public function getmerchantshopajax(Request $request){
      $unionHtmlOption = "<option value=''>Select Merchant Shop</option>";
      $merchant_id = $request->merchant_id;
 
      $merchantshops = Merchant_shop::where('merchant_id',$merchant_id)->get();
      foreach ($merchantshops as $merchantshop) {
        $unionHtmlOption .= "<option value='$merchantshop->id'>$merchantshop->shop_name</option>";
      }
      // echo $cityHtmlOption;
      return ($unionHtmlOption);
    } 

      







}
