<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrderItems;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        //

       $orderItem = OrderItems::all();
       return response()->json(($orderItem));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $orderItem = OrderItems::create((($request->all())));
        return response()->json(($orderItem),201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $orderItem =Orderitems::find(($id));
        return response()->json(($orderItem));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $item = OrderItems::find($id);
        if(!$item){
            return response()->json(['message'=>'Order Item not found'], 404);
        }

        $item ->Update($request->all());
        return response()->json($item);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $item = OrderItems::find($id);
        if($item){
            return response()->json(['message'=>'Order Item not found'],404);
        }
        $item->delete();
        return response()->json(['message'=>'Order Item deleted successfully']);
    }
}
