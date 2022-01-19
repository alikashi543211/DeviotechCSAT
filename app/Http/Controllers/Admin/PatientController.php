<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Diagnose;
use App\Models\VisitType;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function categoryList()
    {
        $list=Category::all();
        return view('admin.patient_cruds.category-list',get_defined_vars());
    }

    public function categorySave(Request $request)
    {
        $request->validate(['category'=>'required']);
        Category::create($request->all());
        return redirect()->back()->with('success','Category has been added successfully');
    }
    public function categoryUpdate(Request $request)
    {
        $request->validate(['category'=>'required','id'=>'required']);
        Category::where('id',$request->id)->update([
            'category'=>$request->category,
            'status'=>$request->status,
        ]);
        return redirect()->back()->with('success','Category has been updated successfully');

    }

    public function categoryDelete($id)
    {
        $county=Category::where('id',$id)->first();
        if($county==null)
        {
            return redirect()->back()->with('error','Record not found');
        }
        $county->delete();
        return redirect()->back()->with('success','Category has been deleted successfully');
    }

    public function diagnoseList()
    {
        $list=Diagnose::all();
        return view('admin.patient_cruds.diagnose-list',get_defined_vars());
    }

    public function diagnoseSave(Request $request)
    {
        $request->validate(['diagnose'=>'required']);
        Diagnose::create($request->all());
        return redirect()->back()->with('success','Diagnose has been added successfully');
    }
    public function diagnoseUpdate(Request $request)
    {
        $request->validate(['diagnose'=>'required','id'=>'required']);
        Diagnose::where('id',$request->id)->update([
            'diagnose'=>$request->diagnose,
            'status'=>$request->status,
        ]);
        return redirect()->back()->with('success','Diagnose has been updated successfully');

    }

    public function diagnoseDelete($id)
    {
        $county=Diagnose::where('id',$id)->first();
        if($county==null)
        {
            return redirect()->back()->with('error','Record not found');
        }
        $county->delete();
        return redirect()->back()->with('success','Diagnose has been deleted successfully');
    }


    public function visitList()
    {
        $list=VisitType::all();
        return view('admin.patient_cruds.visit-type-list',get_defined_vars());
    }

    public function visitSave(Request $request)
    {
        $request->validate(['name'=>'required']);
        VisitType::create($request->all());
        return redirect()->back()->with('success','Visit Tyoe has been added');
    }
    public function visitUpdate(Request $request)
    {
        $request->validate(['name'=>'required','id'=>'required']);
        VisitType::where('id',$request->id)->update([
            'name'=>$request->name,
            'status'=>$request->status,
        ]);
        return redirect()->back()->with('success','Visit type has been updated');

    }

    public function visitDelete($id)
    {
        $county=VisitType::where('id',$id)->first();
        if($county==null)
        {
            return redirect()->back()->with('error','Record not found');
        }
        $county->delete();
        return redirect()->back()->with('success','Visit Type has been deleted ');
    }
}
