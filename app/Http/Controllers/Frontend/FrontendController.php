<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\Area\Division;
use App\Model\Backend\Area\District;
use App\Model\Backend\Area\Area;

class FrontendController extends Controller
{
    public function index()
    {
    	return view('frontend.pages.index');
    }


    public function contact()
    {
    	return view('frontend.pages.contact');
    }

    public function about()
    {
    	return view('frontend.pages.about');
    }  

    public function privacy()
    {
    	return view('frontend.pages.privacy');
    }

    public function returnpolicy()
    {
    	return view('frontend.pages.returnpolicy');
    }

    public function blogs()
    {
    	return view('frontend.pages.blogs');
    }

    public function blogdetail($slug)
    {
    	return view('frontend.pages.blogdetail');
    }

    public function merchant()
    {
       
       $data['districts'] = District::all();
       $data['areas']     = Area::all();

        return view('frontend.pages.merchant',$data);
    }


    public function agent()
    {
   
       $data['districts'] = District::all();
       $data['areas']     = Area::all();
       
        return view('frontend.pages.agent',$data);
    }

    public function deliveryman()
    {
        return view('frontend.pages.deliveryman');
    }











}
