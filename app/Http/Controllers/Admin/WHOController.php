<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WHO;
use App\Models\Expectation;
use App\Models\Quality;
use App\Models\Assistance;


class WHOController extends Controller
{
    //who crud
    public function whoList()
    {
        $list = WHO::all();
        return view('admin.county.who-list',get_defined_vars());
    }

    public function whoSave(Request $request)
    {
        $request->validate(['who'=>'required']);
        WHO::create($request->all());
        return redirect()->back()->with('success','WHO has been added successfully');
    }
    public function whoUpdate(Request $request)
    {
        $request->validate(['who'=>'required','id'=>'required']);
        WHO::where('id',$request->id)->update([
            'who'=>$request->who,
            'status'=>$request->status,
        ]);
        return redirect()->back()->with('success','WHo has been updated successfully');
    }

    public function whoDelete($id)
    {
        $who=WHo::where('id',$id)->first();
        if($who==null)
        {
            return redirect()->back()->with('error','Record not found');
        }
        $who->delete();
        return redirect()->back()->with('success','WHO has been deleted successfully');
    }

    //expectation crud
    public function expectList()
    {
        $list = Expectation::all();
        return view('admin.county.expect-list',get_defined_vars());
    }

    public function expectSave(Request $request)
    {
        $request->validate(['expect'=>'required']);
        Expectation::create($request->all());
        return redirect()->back()->with('success','Expect has been added successfully');
    }
    public function expectUpdate(Request $request)
    {
        $request->validate(['expect'=>'required','id'=>'required']);
        Expectation::where('id',$request->id)->update([
            'expect'=>$request->expect,
            'status'=>$request->status,
        ]);
        return redirect()->back()->with('success','Expect has been updated successfully');
    }

    public function expectDelete($id)
    {
        $expect=Expectation::where('id',$id)->first();
        if($expect==null)
        {
            return redirect()->back()->with('error','Record not found');
        }
        $expect->delete();
        return redirect()->back()->with('success','Expect has been deleted successfully');
    }

    //quality of life crud
    public function qualityList()
    {
        $list = Quality::all();
        return view('admin.county.quality-list',get_defined_vars());
    }

    public function qualitySave(Request $request)
    {
        $request->validate(['quality'=>'required']);
        Quality::create($request->all());
        return redirect()->back()->with('success','Quality has been added successfully');
    }
    public function qualityUpdate(Request $request)
    {
        $request->validate(['quality'=>'required','id'=>'required']);
        Quality::where('id',$request->id)->update([
            'quality'=>$request->quality,
            'status'=>$request->status,
        ]);
        return redirect()->back()->with('success','Quality has been updated successfully');
    }

    public function qualityDelete($id)
    {
        $expect=Quality::where('id',$id)->first();
        if($expect==null)
        {
            return redirect()->back()->with('error','Record not found');
        }
        $expect->delete();
        return redirect()->back()->with('success','Quality has been deleted successfully');
    }

    //assistance service of life crud
    public function assistanceList()
    {
        $list = Assistance::all();
        return view('admin.county.assistance-list',get_defined_vars());
    }

    public function assistanceSave(Request $request)
    {
        $request->validate(['assistance'=>'required']);
        Assistance::create($request->all());
        return redirect()->back()->with('success','Assistance has been added successfully');
    }
    public function assistanceUpdate(Request $request)
    {
        $request->validate(['assistance'=>'required','id'=>'required']);
        Assistance::where('id',$request->id)->update([
            'assistance'=>$request->assistance,
            'status'=>$request->status,
        ]);
        return redirect()->back()->with('success','Assistance has been updated successfully');
    }

    public function assistanceDelete($id)
    {
        $expect=Assistance::where('id',$id)->first();
        if($expect==null)
        {
            return redirect()->back()->with('error','Record not found');
        }
        $expect->delete();
        return redirect()->back()->with('success','Assistance has been deleted successfully');
    }
}

