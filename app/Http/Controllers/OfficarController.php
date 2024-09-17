<?php

namespace App\Http\Controllers;

use App\Http\Resources\OfficarResource;
use App\Models\Officar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OfficarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offices = Officar::all();
             return view('Officer.indexOff', [
                 'offices' => $offices
             ]);
          

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create');
        return view('Officer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      //Gate::authorize('create');
        $request->validate([
            'Office_Name' => 'required|min:3',
            'address' => 'required|max:10|min:3',
            'Country' => 'required|min:2',
            'current_balance' => 'required',
        ]);
        $officer = new Officar;
        $officer->Office_Name = $request->Office_Name;
        $officer->address = $request->address;
        $officer->Country = $request->Country;
        $officer->current_balance = $request->current_balance;
        $officer->save();

        $officer = Officar::all();
              return redirect()->route('off.index')->with('succes','تم عملية الاضافة');
    }

    /**
     * Display the specified resource.
     */
    public function show(Officar $officar)
    {
        return view('Officer.indexOff');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id,Officar $officar)
    {
      // Gate::authorize('update',$officar);
        // return view('Officer.edid', [
        //     'office' => $officar
        // ]);
        $offices=Officar::find($id);
        return view('Officer.edid',compact('offices'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {

        // $request->validate([
        //     'Office_Name' => 'required|min:3',
        //     'address' => 'required|max:10|min:3',
        //     'Country' => 'required|min:2',
        //     'current_balance' => 'required',
        // ]);
        
        // $officar->update([
        //     'Office_Name' =>$request->Office_Name,
        //     'address'=>$request->address,
        //     'Country'=>$request->Country,
        //     'current_balance'=>$request->current_balance
        // ]); 

       
      
        $officer = Officar::find($id);
        $request->validate([
            'Office_Name' => 'required|min:3',
            'address' => 'required|max:10|min:3',
            'Country' => 'required|min:2',
            'current_balance' => 'required',
        ]);
        
        $officer->Office_Name = $request->Office_Name;
        $officer->address = $request->address;
        $officer->Country = $request->Country;
        $officer->current_balance = $request->current_balance;
        $officer->save();

        
            
        return redirect()->route('off.index')->with('success', 'تم تحديث المكتب بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Officar $officar,$id)
{
  // Gate::authorize('delete',$officar);
  $officar=Officar::find($id);
    $officar->delete();
    return redirect()->back()->with('success', 'تم حذف المكتب');
}

}
