<?php

namespace App\Http\Controllers;
//namespace App\Http\Controllers\Auth;

use App\Customer;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //use RegistersUsers;
    protected $redirectTo = '/login';
    public function getCustomerRegister()
    {
        return view('auth/customerRegistration');
    }

    public function postCustomerRegister(Request $request){
        $this->validate($request,[
            'name'=>'string|max:255|required',
            'email'=>'string|max:255|email|required|unique:users',
            'contact'=>'string|required|max:13',

            'state'=>'string|required',
            'City'=>'string|required',
            'flatNo'=>'string|required',
            'streetColony'=>'string|required',
            'landMark'=>'string|required',
            'password'=>'string|required|confirmed',
        ]);

        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->contact=$request->contact;
        $user->password=bcrypt($request->password);
        $user->user_role_id=3;
        $user->save();

        $address=$request->flatNo."/".$request->streetColony."/".$request->landMark."/".$request->City."/".$request->state;

        $customer=new Customer();
        $customer->user_id=$user->id;
        $customer->address=$address;
        $customer->save();

        //echo "<script>alert('Customer registered successfully!');</script>";
        return redirect()->route('login')->with('success','Customer registered successfully');
    }
}
