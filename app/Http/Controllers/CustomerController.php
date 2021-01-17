<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();        
        return $customers->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'password' => 'required',
            'gender' => 'required',
            'married' => 'required',
            'address' => 'required',
        ]);

        $customer = new Customer();
        $customer->name = $validatedData['name'];
        $customer->email = $validatedData['email'];
        $customer->password = $validatedData['password'];
        $customer->gender = $validatedData['gender'];
        $customer->married = $validatedData['married'];
        $customer->address = $validatedData['address'];
        $customer->save();

        $msg = [
            'success' => true,
            'message' => 'Berhasil ditambahkan!'
        ];
   
          return response()->json($msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
 
        return $customer->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
 
        return $customer->toJson();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'password' => 'required',
            'gender' => 'required',
            'married' => 'required',
            'address' => 'required',
          ]);
   
          $customer = Customer::find($id);
          $customer->name = $validatedData['name'];
          $customer->email = $validatedData['email'];
          $customer->password = $validatedData['password'];
          $customer->gender = $validatedData['gender'];
          $customer->married = $validatedData['married'];
          $customer->address = $validatedData['address'];
          $customer->save();
   
          $msg = [
              'success' => true,
              'message' => 'Berhasil di update!'
          ];
   
          return response()->json($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        if(!empty($customer)){
            $customer->delete();
            $msg = [
                'success' => true,
                'message' => 'Berhasil di hapus!'
            ];
            return response()->json($msg);
        } else {
            $msg = [
                'success' => false,
                'message' => 'Gagal di hapus!'
            ];
            return response()->json($msg);
        }
    }
}
