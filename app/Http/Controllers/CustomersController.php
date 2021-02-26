<?php

namespace App\Http\Controllers;

use App\customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $c=customer::All();
        return view('admin.customers.index', ['customers'=>$c]);
    }
}