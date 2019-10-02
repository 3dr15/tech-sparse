<?php

namespace App\Http\Controllers;

use App\Audit;
use App\Order;
use App\OrderRequest;
use App\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewOrderRequestController extends Controller
{
    //Vendor Home Controller
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
        if($userRole!='Vendor'){
            return view('unAuthorisedUser',['user'=> Auth::user()->name ]);
        }

        $newRequests=new OrderRequest();
        $newRequests=$newRequests->all();
        //$specifications=json_decode($newRequests[0]->specifications);
        //dd($specifications);
        //dd($newRequests);
        return view('newRequest',compact('newRequests'));
    }
    public function postQuotation(Request $request){
        $this->validate($request,[
            'request_by'=>'required|string',
            'processor_price'=>'required|string',
            'gpu_price'=>'required|string',
            'storage_price'=>'required|string',
            'RAM_price'=>'required|string',
            'monitor_price'=>'required|string',
            'keyboardMouse_price'=>'required|string',
            'OS_price'=>'required|string',
            'Total'=>'required|string',
            'discountRate'=>'required|string',
            'grandTotal'=>'required|string',
        ]);
        $prices=array(
            'processor_price'=>$request->processor_price,
            'gpu_price'=>$request->gpu_price,
            'storage_price'=>$request->storage_price,
            'RAM_price'=>$request->RAM_price,
            'monitor_price'=>$request->monitor_price,
            'keyboardMouse_price'=>$request->keyboardMouse_price,
            'OS_price'=>$request->OS_price,
            'Total'=>$request->Total,
            'discountRate'=>$request->discountRate,
            'grandTotal'=>$request->grandTotal,
        );
        $prices="".json_encode($prices);
        $quotation=new Quotation();
        $quotation->order_request_id=$request->request_by;
        $quotation->user_id=Auth::user()->id;
        $quotation->quotationDetail=$prices;
        $quotation->save();
        return redirect()->back()->with('success','Quotation Sent Successfully!');
    }

    public function getOrders(){
        $currentUser=Auth::user()->id;
        $orders=Order::all();
        $selectedOrders=array();
        $i=0;
        foreach ($orders as $order){
            if($order->quotation->user->id==$currentUser){
                $selectedOrders[$i++]=$order;
            }
        }
        //dd($selectedOrders);
        return view('orders',compact('selectedOrders'));
    }

    public function orderDone(Request $request){
        $this->validate($request,[
            'paidBy'=> '',
            'amount'=>'',
        ]);

        $user=Auth::user();
        $audit=new Audit();
        $audit->payMethod=1;
        $audit->user_paidTo_id=$user->id;
        $audit->user_paidBy_id=$request->paidBy;
        $audit->amount=$request->amount;
        $audit->save();
        return redirect('/Audit')->with('success','Order Delivered and Payment Received');
    }

    public function audits(){
        $Audits=Audit::all();
        return view('admin.auditDetails',compact('Audits'));
    }
}
