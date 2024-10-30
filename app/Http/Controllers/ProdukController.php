<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = produk::orderBy('name', 'asc')->get();
        return response()->json([
            'status'=> true,
            'message'=> 'data ditemukan',
            'data' => $data,
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new produk();
        $rules = [
            'name' => 'required',
            'price' => 'required',
            'desc' => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            return response()->json([
               'status'=>false,
               'message'=>'store gagal',
               'data'=> $validator->errors()
            ],401);
        }

        $data->name= $request->name;
        $data->price= $request->price;
        $data->desc= $request->desc;
        $data->save();

        return response()->json([
            'status'=>true,
            'message'=> 'berhasil store'
        ],200);

    }

    /**
     * Display the specified resource.
     */
    public function show(produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(produk $produk)
    {
        //
    }
}