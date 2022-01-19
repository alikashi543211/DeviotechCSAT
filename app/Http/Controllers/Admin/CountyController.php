<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\County;
use App\Models\Locality;
use App\Models\Province;
use Illuminate\Http\Request;

class CountyController extends Controller
{
    public function countyList()
    {
        $list=County::all();
        $provinces = Province::where('status', true)
        ->get();
        return view('admin.county.county-list',get_defined_vars());
    }

    public function countySave(Request $request)
    {
        $request->validate(['county'=>'required', 'province_id'=>'required']);
        County::create($request->all());
        return redirect()->back()->with('success','County has been added successfully');
    }
    public function countyUpdate(Request $request)
    {
        $request->validate(['county'=>'required', 'province_id'=>'required', 'id'=>'required']);
        County::where('id',$request->id)->update([
            'county'=>$request->county,
            'province_id'=>$request->province_id,
            'status'=>$request->status,
        ]);
        return redirect()->back()->with('success','County has been updated successfully');

    }

    public function countyDelete($id)
    {
        $county=County::where('id',$id)->first();
        if($county==null)
        {
            return redirect()->back()->with('error','Record not found');
        }
        $county->delete();
        return redirect()->back()->with('success','County has been deleted successfully');
    }


    public function localityList()
    {
        $list=Locality::all();
        $counties=County::where('status',true)->get();
        return view('admin.county.locality-list',get_defined_vars());
    }

    public function localitySave(Request $request)
    {
        $request->validate(['locality'=>'required','county_id'=>'required']);
        Locality::create([
            'county_id'=>$request->county_id,
            'locality'=>$request->locality,
        ]);
        return redirect()->back()->with('success','Locality has been added successfully');
    }

    public function LocalityUpdate(Request $request)
    {
        $request->validate(['county_id'=>'required','locality'=>'required','id'=>'required']);
        Locality::where('id',$request->id)->update([
            'county_id'=>$request->county_id,
            'locality'=>$request->locality,
            'status'=>$request->status,
        ]);
        return redirect()->back()->with('success','Locality has been updated successfully');

    }

    public function localityDelete($id)
    {
        $locality=Locality::where('id',$id)->first();
        if($locality==null)
        {
            return redirect()->back()->with('error','Record not found');
        }
        $locality->delete();
        return redirect()->back()->with('success','Locality has been deleted successfully');
    }



    public function provinceList()
    {
        $list=Province::all();
        return view('admin.county.province-list',get_defined_vars());
    }

    public function provinceSave(Request $request)
    {
        $request->validate(['province'=>'required']);
        Province::create([
            'province'=>$request->province,
        ]);
        return redirect()->back()->with('success','Province has been added successfully');
    }

    public function provinceUpdate(Request $request)
    {
        $request->validate(['province'=>'required','id'=>'required']);
        Province::where('id',$request->id)->update([
            'province'=>$request->province,
            'status'=>$request->status,
        ]);
        return redirect()->back()->with('success','Province has been updated successfully');

    }

    public function provinceDelete($id)
    {
        $province=Province::where('id',$id)->first();
        if($province==null)
        {
            return redirect()->back()->with('error','Record not found');
        }
        $province->delete();
        return redirect()->back()->with('success','Province has been deleted successfully');
    }
}
