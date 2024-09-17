<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RemittancesResource;
use App\Models\Remittances;
use Illuminate\Http\Request;

class RemittancesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      // return Remittances::all();
      return RemittancesResource::collection(Remittances::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $remittances=new Remittances;
        $remittances->num_Remitten=$request->num_Remitten;
        $remittances->sending_Office=$request->sending_Office;
        $remittances->Future_Office=$request->Future_Office;
        $remittances->Amount_Trens=$request->Amount_Trens;
        $remittances->date=$request->date;
        $remittances->save();
        return new RemittancesResource($remittances);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $rem=Remittances::find($id);
        return $rem;
       // return new RemittancesResource($remittances);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Remittances $remittances)
    {
        $remittances->update($request->only([
            'num_Remitten','sending_Office','Future_Office','Amount_Trens','date'
          ]));
          return new RemittancesResource($remittances);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $remittances=Remittances::find($id);
        $remittances->delete();
        return response()->json(null,204);
    }
}
