<?php

namespace App\Http\Controllers\Backend\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Frontend\Agent;
use App\Model\Frontend\DeliveryMan;
use App\Model\Frontend\Merchant;


class UserRegistrationController extends Controller
{
    

	public function merchantlist()
	{
		$data['merchants'] = Merchant::orderBy('id','DESC')->get();
		return view('backend.admin.user.userregistration.merchant',$data);
	}


	public function merchantshow($id)
	{
		$data['merchant'] = Merchant::find($id);
		return view('backend.admin.user.userregistration.merchantshow',$data);
	}



	public function agentlist()
	{
		$data['agents'] = Agent::orderBy('id','DESC')->get();
		return view('backend.admin.user.userregistration.agent',$data);
	}


	public function agentshow($id)
	{
		$data['agent'] = Agent::find($id);
		return view('backend.admin.user.userregistration.agentshow',$data);
	}	


	public function deliverylist()
	{
		$data['deliverymans'] = DeliveryMan::orderBy('id','DESC')->get();
		return view('backend.admin.user.userregistration.deliveryman',$data);
	}


	public function deliveryshow($id)
	{
		$data['deliveryman'] = DeliveryMan::find($id);
		return view('backend.admin.user.userregistration.deliverymanshow',$data);
	}











}
