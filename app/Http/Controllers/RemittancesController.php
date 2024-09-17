<?php

namespace App\Http\Controllers;

use App\Models\Officar;
use App\Models\Remittances;
use Illuminate\Http\Request;

class RemittancesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
    $remittances = Remittances::all();
    return view('Remittances.index')->with('remittances', $remittances);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Remittances.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'num_Remitten' => 'required',
            'sending_Office' => 'required',
            'Future_Office' => 'required',
            'Amount_Trens' => 'required',
        ]);
    
         
        $sendingOffice = Officar::where('id', $request->sending_Office)->first();
        if ($sendingOffice->current_balance < $request->Amount_Trens) {
            return redirect()->back()->with('error', 'رصيد المكتب المرسل غير كافي.');
        }
    
        
        $remittances = new Remittances;
        $remittances->num_Remitten = $request->num_Remitten;
        $remittances->sending_Office = $request->sending_Office;
        $remittances->Future_Office = $request->Future_Office;
        $remittances->Amount_Trens = $request->Amount_Trens;
        $remittances->date = now();
        $remittances->save();
    
        
        $sendingOffice->current_balance -= $request->Amount_Trens;
        $sendingOffice->save();
    
        
        $futureOffice = Officar::where('id', $request->Future_Office)->first();
        $futureOffice->current_balance += $request->Amount_Trens;
        $futureOffice->save();
    
            
        return redirect()->route('reim.index')->with('success', 'تمت عملية التحويل بنجاح.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Remittances $remittances)
    {
         return view('Remittances.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Remittances $remittances)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Remittances $remittances)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Remittances $remittances)
    {
        //
    }
}
