<?php

namespace App\Http\Controllers;

use App\BillDetail;
use App\Bill;
use App\Product;
use Illuminate\Http\Request;

class BillDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $billdetails = BillDetail::All();
        return view('admin.billdetails.index',['billdetails'=>$billdetails]);
    }
}