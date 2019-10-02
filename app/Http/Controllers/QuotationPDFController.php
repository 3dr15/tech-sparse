<?php

namespace App\Http\Controllers;

use App\Quotation;
use Illuminate\Http\Request;

class QuotationPDFController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($quotationId){
        $quotation=Quotation::find($quotationId);
        if($quotation==null){
            return abort(404);
        }
        return view('QuotationPDF',compact('quotation'));
    }
}
