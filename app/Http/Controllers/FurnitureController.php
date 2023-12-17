<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Furniture;
use Illuminate\Contracts\Validation\Validator;

class FurnitureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $furniture = Furniture::all();
    
     return response()->json([ 
        'status' => '200',
     'furniture' => $furniture],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(),[
        //     'product_code' => 'require',
        //     'name' =>'require|max:191',
        //     'price' => 'require',
        //     'avatar' => 'require',
        // ]);
        // if($validator->fails()){
        //     return response() -> json([
        //         'status' => '422',
        //         'errors' => $validator->message()
        //     ],422);
        // }else{
            $furniture = new Furniture;
            
            $furniture->products_code = $request->product_code;
            $furniture->name = $request->name;
            $furniture->price = $request->price;
            $furniture->avatar = $request->avatar;
            $furniture->save();
            return response()->json($furniture);
        
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
      $furniture = Furniture::findOrFail($id);
      return response()->json($furniture);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    
    {
        $furniture = Furniture::findOrFail($id);
        $furniture->products_code = $request->product_code;
        $furniture->name = $request->name;
        $furniture->price = $request->price;
        $furniture->avatar = $request->avatar;
        $furniture->save();
        return response()->json($furniture);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $furniture = Furniture::findOrFail($id);
        $furniture->delete();
        return response() ->json($furniture);
    }
}
