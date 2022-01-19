<?php

namespace App\Http\Controllers\CareManager;

use App\Http\Controllers\Controller;
use App\Models\CareGiver;
use App\Models\User;
use Illuminate\Http\Request;

class CareGiverController extends Controller
{
    public function List()
    {
        $list=CareGiver::all();
        
        return view('care-manager.care-giver.list',get_defined_vars());
    }

    public function add()
    {
        return view('care-manager.care-giver.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'id_number' => 'required|string|max:255|unique:care_givers',
        ]);
       CareGiver::create([
           'name'=>$request->name,
           'id_number'=>$request->id_number,
           'user_id'=>auth()->user()->id,
       ]);
       return redirect()->route('caremanager.caregiver.list')->with('success','CAREGiver has been added');
    }

    public function edit($id)
    {
        $data=CareGiver::where('id',$id)->first();
        if ($data==null)
        {
            return redirect()->back()->with('error','Record Not Found');
        }
        return view('care-manager.care-giver.edit',get_defined_vars());
    }
    public function update(Request $request)
    {
        $data=CareGiver::where('id_number',$request->id_number)->where('id','!=',$request->id)->first();
        if($data!=null)
        {
            $request->validate([
                'name'=>'required',
                'id_number' => 'required|string|max:255|unique:care_givers',
            ]);
        }
        else{
            $request->validate([
                'name'=>'required',
                'id_number' => 'required|string|max:255',
            ]);
        }
        CareGiver::where('id',$request->id)->update([
            'name'=>$request->name,
            'id_number'=>$request->id_number,
        ]);
        return redirect()->route('caremanager.caregiver.list')->with('success','');


    }

    public function delete($id)
    {
        $county=CareGiver::where('id',$id)->first();
        if($county==null)
        {
            return redirect()->back()->with('error','Record not found');
        }
        $county->delete();
        return redirect()->back()->with('success','Care Manager has been deleted');
    }
}
