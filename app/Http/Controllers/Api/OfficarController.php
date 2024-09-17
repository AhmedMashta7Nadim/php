<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OfficarResource;
use App\Models\Officar;
use Illuminate\Http\Request;

class OfficarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Officar::all();
        return OfficarResource::collection(Officar::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $officer=new Officar;
       $officer->Office_Name=$request->Office_Name;
       $officer->address=$request->address;
       $officer->Country=$request->Country;
       $officer->current_balance=$request->current_balance;
       $officer->save();
       return new OfficarResource($officer);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
      $officar=Officar::findOrFail($id);
        return $officar;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Officar $officar)
    {
        $officar->update($request->only([
          'Office_Name','address','Country','current_balance'
        ]));
        return new OfficarResource($officar);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $officar=Officar::find($id);
        $officar->delete();
        return response()->json(null,204);
    }
}
