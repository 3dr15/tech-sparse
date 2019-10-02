<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use App\Vendor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class VendorController extends Controller
{

    protected $redirectTo = '/login';
//    protected $redirectTo = route('home.vender');
    public function getVendorRegister()
    {
        return view('auth/vendorRegistration');
    }
    public function postVendorRegister(Request $request)
    {
        $this->validate($request,[
            'name' => 'string|max:255|required',
            'email'=>'string|max:255|email|required|unique:users',
            'shopName'=>'string|required',
            'contact'=>'string|required|max:13',
            'altPhone'=>'string|required|max:13',
            'state'=>'string|required',
            'City'=>'string|required',
            'flatNo'=>'string|required',
            'streetColony'=>'string|required',
            'landMark'=>'string|required',
            'docProofType'=>'string|required',
            'proofNumber'=>'string|required',
            'sellingCapacity'=>'string|required',
            'password'=>'string|required|confirmed',
        ]);



        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->contact=$request->contact;
        $user->password=bcrypt($request->password);
        $user->user_role_id=2;
        $user->save();

        $address=$request->flatNo."/".$request->streetColony."/".$request->landMark."/".$request->City."/".$request->state;

        $vender=new Vendor();
        $vender->user_id=$user->id;
        $vender->vendorName=$user->name;
        $vender->shopName=$request->shopName;
        $vender->altPhone=$request->altPhone;
        $vender->address=$address;
        $vender->landLine=$request->altPhone;
        $vender->fax=$request->altPhone;
        $vender->documentProof=$request->docProofType." / ".$request->proofNumber;
        $vender->sellingCapacity=$request->sellingCapacity;
        $vender->companiesDealWith=' ';
        $vender->payAcceptMethod_id=1;
        $vender->save();
        return redirect()->route('login')->with('success',"Vendor registered successfully");
    }

}
