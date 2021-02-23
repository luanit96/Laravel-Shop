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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $customers = Customer::All();
        // return view('admin.customers.create',['customers'=>$customers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $dt = date('Y-m-d H:i:s');
        // $customer = customer::create([
        //     "customername"=>$request->input('inputCustomername'),
        //     "gender"=>$request->input('inputGender'),
        //     "email"=>$request->input('inputEmail'),
        //     "address"=>$request->input('inputAddress'),
        //     "phone"=>$request->input('inputPhone'),
        //     "note"=>$request->input('inputNote'),
        //     "created_at"=>$dt
        // ]);
        // if ($customer)
        // {
        //     return redirect()->back()->with("message", "Thêm mới thành công");
        // }
        // return back()->withInput()->with("message", "Không thể thêm mới, có lỗi");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer $customer)
    {
        //
    }
}
