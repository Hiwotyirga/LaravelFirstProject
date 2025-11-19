<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Citizen;
use App\Models\Citizens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $citizen = Citizens::all();
        return response()->json($citizen);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // $citizen = Citizens::create($request->all()));
        $citizen = Citizens::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'phone_number'=>$request->phone_number,
            'password'=>Hash::make($request->password),
        ]);
        return response()->json ($citizen,201);
    }

    public function login(Request $request)
    {
        $citizen = Citizens::where('email',$request->email)->first();

        if(!$citizen || !Hash::check($request->password, $citizen->password)){
            return response()->json(['message'=>'Invalid credentials'],401);
        }

        $token  = $citizen->createToken(('api_token'))->plainTextToken;

        return response()->json([
            'message'=>'Login successful',
        'citizen'=>$citizen,
        'token'=>$token,
    ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $citizen = Citizens::find($id);
        if($citizen->id != $id){
            return response()->json(['message'=>'Citizen not found'],404);
        }
        return response()->json($citizen);
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $citizen = Citizens::find($id);
        if(!$citizen){
            return response()->json(['message'=>'Citizen not found'],404);
        }
        $citizen->update($request->all());
        return response()->json($citizen);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $citizen = Citizens::find($id);
        if(!$citizen){
            return response()->json(['message'=>'Citizen not found'],404);

        }
        $citizen->delete();
        return response()->json($citizen);

    }
}
