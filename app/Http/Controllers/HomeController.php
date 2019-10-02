<?php

namespace App\Http\Controllers;

use App\Audit;
use App\Order;
use App\OrderRequest;
use App\Quotation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function valid(){
        $userRole= Auth::user()->userRole->roles;
        if($userRole!='Customer'){
            return view('unAuthorisedUser',['user'=> Auth::user()->name ]);
        }
    }

    public function postRequest(Request $request ){
        //dd($request);
        $this->validate($request,[
            'processor'=>'string|max:255|required',
            'processor_type'=>'string|max:255|required',
            'gpu'=>'string|required',
            'gpu_type'=>'string|required',
            'RAM'=>'string|required',
            'storage'=>'string|required',
            'storage_space'=>'string|required',
            'MonitorType'=>'string|required',
            'MonitorSize'=>'string|required',
            'OS'=>'string|required',
            'OSType'=>'string|required',
            'KeyboardMouse'=>'string|required',
        ]);

        $specification=array([
            'processor'=>$request->processor,
            'processor_type'=>$request->processor_type,
            'gpu'=>$request->gpu,
            'gpu_type'=>$request->gpu_type,
            'RAM'=>$request->RAM,
            'storage'=>$request->storage,
            'storage_space'=>$request->storage_space,
            'MonitorType'=>$request->MonitorType,
            'MonitorSize'=>$request->MonitorSize,
            'OS'=>$request->OS,
            'OSType'=>$request->OSType,
            'KeyboardMouse'=>$request->KeyboardMouse,
        ]);
        $specification="".json_encode($specification);
        $orderRequest=new OrderRequest();
        $orderRequest->user_id=Auth::user()->id;
        $orderRequest->specifications=$specification;
        $orderRequest->save();

        //return redirect()->action('HomeController@index');
        return redirect()->back()->with('success', 'Your Order Request Has Been Sent To Vendors, Please Wait For Responses');
    }
    public function index()
    {
        //dd(User::find($user));
        $this->valid();
        return view('orderRequest');
    }
    public function orderRequests(){
        $userRole= Auth::user()->userRole->roles;
        if($userRole!='Customer'){
            return view('unAuthorisedUser',['user'=> Auth::user()->name ]);
        }

        $requests=Auth::user()->orderrequest;
        //$newRequests=$newRequests->all();
        //$specifications=json_decode($newRequests[0]->specifications);
        //dd($specifications);
        return view('orderRequests',compact('requests'));
    }
    public function getQuotations($request_id){
        $orderRequest=Auth::user()->orderrequest->find($request_id);

//        $orderRequest=Auth::user()->orderrequest->find($request_id);
        //dd($orderRequest->quotation);
        //print_r(((array)Auth::user()->orderrequest->find((int)$request_id)->quotation[0]->order->created_at)['date']);
        //print_r((array)Auth::user()->orderrequest->find((int)$request_id)->quotation[0]->order->created_at['date']);

        //dd(Auth::user()->orderrequest->find((int)$request_id)->quotation[0]->order->created_at);
        //dd($orderRequest->quotation);
        return view('quotation',[
            'quotations'=>$orderRequest->quotation,
        ]);
    }

    public function sendOrder($quotation_id){
        $order= new Order();
        $order->user_id=Auth::user()->id;
        $order->quotation_id=$quotation_id;
        $order->payMethod_id=1;
        $order->save();
        return redirect()->back();
    }
    public function cancelOrder($quotation_id){
        $order= new Quotation();
        $order=$order->find($quotation_id);
        $order->delete();
        return redirect()->back();
    }

    public function audits(){
        $Audits=Audit::all();
        return view('admin.auditDetails',compact('Audits'));
    }
}
