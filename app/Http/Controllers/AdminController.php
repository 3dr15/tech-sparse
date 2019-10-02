<?php

namespace App\Http\Controllers;

use App\Audit;
use App\Customer;
use App\Order;
use App\RatingNFeedback;
use App\UserRole;
use App\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $userRole= Auth::user()->userRole->roles;
        if($userRole!='Admin'){
            return view('unAuthorisedUser',['user'=> Auth::user()->name ]);
        }
        $customerCount=Customer::all()->count();
        $vendorCount=Vendor::all()->count();
        $orderCount=Order::all()->count();
        $auditCount=Audit::all()->count();
        //$auditCount=100;
        return view('admin.dashboard',[
            'customerCount'=>$customerCount,
            'vendorCount'=>$vendorCount,
            'orderCount'=>$orderCount,
            'auditCount'=>$auditCount,

        ]);
    }

    public function customerDetails(){
        $userRole=UserRole::find(3);
        $customers=$userRole->user;

        return view('admin.customerDetails',compact('customers'));
    }

    public function customerDelete(\App\User $id){
        //$id->delete();
        return redirect()->back()->with('success','Customer has been deleted');
    }

    public function printCustomerDetails(){
        return view('admin.customerDetails');
    }

    public function vendorDetails(){
        $userRole=UserRole::find(2);
        $vendors=$userRole->user;

        return view('admin.vendorDetails',compact('vendors'));

    }
    public function vendorDelete(\App\User $id){
        //$id->delete();
        return redirect()->back()->with('success','Vendor has been deleted');
    }

    public function printVendorDetails(){
        return view('admin.vendorDetails');
    }

    public function orderDetails(){
        $orderDetails=Order::all();

        return view('admin.orderDetails',compact('orderDetails'));
    }

    public function printOrderDetails(){
        return view('admin.orderDetails');
    }

    public function auditDetails(){
        $Audits=Audit::all();
        return view('admin.auditDetails',compact('Audits'));
    }

    public function printAuditDetails(){
        return view('admin.auditDetails');
    }

    public function feedback(){
        $feedbacks=RatingNFeedback::all();
        return view('admin.feedbacks',compact('feedbacks'));
    }
}
