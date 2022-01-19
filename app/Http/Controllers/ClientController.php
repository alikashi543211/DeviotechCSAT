<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Client;
use App\Models\County;
use App\Models\Diagnose;
use App\Models\Locality;
use App\Models\Province;
use App\Models\User;
use App\Models\VisitType;
use Carbon\Carbon;
use Excel;
use App\Exports\ClientExport;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function list(Request $request)
    {
        $types = Category::all();
        $counties = County::all();
        $conditions = Diagnose::all();
        if (auth()->user()->role=='admin')
        {
            $clients = Client::where('status','Active');
        }
        else
        {
            $clients = Client::where('status','Active')->where('care_manager_id',auth()->user()->id);
        }
        if ($request->type && $request->type != "all") {
            $clients->where('type', $request->type);
        }
        if ($request->county && $request->county != "all") {
            $clients->where('county', $request->county);
        }
        if ($request->condition && $request->condition != "all") {
            $clients->where('condition', $request->condition);
        }
        $clients = $clients->get();
        if($request->export)
        {
            return Excel::download(new ClientExport($clients), 'clients.xlsx');
        }

        return view('client.list',get_defined_vars());
    }
    public function add()
    {
        $types=Category::where('status',true)->get();
        $conditions=Diagnose::where('status',true)->get();
        $users=User::where('role','care_manager')->where('status','Active')->get();
        $counties=County::where('status',true)->get();
        $localities=Locality::where('status',true)->get();
        return view('client.add',get_defined_vars());
    }

    public function store(Request $request)
    {
        $request->validate([
            'care_start_date'=>'required',
            'name'=>'required',
            'id_number'=>'required|unique:clients',
            'type'=>'required',
            'condition'=>'required',
            'eircode'=>'required',
            'county'=>'required',
            'locality'=>'required',
            'care_manager_id'=>'required',
            'dob'=>'required',
            'province'=>'required',
        ]);
        $county=County::where('id',$request->county)->first();
        $care_manager=User::where('id',$request->care_manager_id)->first();
        Client::create([
            'care_start_date'=>$request->care_start_date,
            'name'=>$request->name,
            'id_number'=>$request->id_number,
            'dob'=>$request->dob,
            'type'=>$request->type,
            'condition'=>$request->condition,
            'eircode'=>$request->eircode,
            'county'=>$county->county,
            'province'=>$request->province,
            'locality'=>$request->locality,
            'care_manager'=>$care_manager->name,
            'care_manager_id'=>$request->care_manager_id,

        ]);
        return redirect()->route('client.list')->with('success','Client has been added');
    }

    public function edit($id)
    {
        $data=Client::where('id',$id)->first();
        $types=Category::where('status',true)->get();
        $conditions=Diagnose::where('status',true)->get();
        $users=User::where('role','care_manager')->where('status','Active')->get();
        $counties=County::where('status',true)->get();
        $localities=Locality::where('status',true)->get();
        $province=Province::where('status',true)->get();
        return view('client.edit',get_defined_vars());
    }

    public function update(Request $request)
    {
        $request->validate([
            'care_start_date'=>'required',
            'name'=>'required',
            'id_number'=>'required',
            'type'=>'required',
            'condition'=>'required',
            'eircode'=>'required',
            'county'=>'required',
            'province'=>'required',
            'locality'=>'required',
            'care_manager_id'=>'required',
            'dob'=>'required',
        ]);
        $county=County::where('id',$request->county)->first();
        $care_manager=User::where('id',$request->care_manager_id)->first();
        Client::where('id',$request->id)->update([
            'care_start_date'=>$request->care_start_date,
            'name'=>$request->name,
            'id_number'=>$request->id_number,
            'dob'=>$request->dob,
            'type'=>$request->type,
            'condition'=>$request->condition,
            'eircode'=>$request->eircode,
            'county'=>$county->county,
            'province'=>$request->province,
            'locality'=>$request->locality,
            'care_manager'=>$care_manager->name,
            'care_manager_id'=>$request->care_manager_id,

        ]);
        return redirect()->route('client.list')->with('success','Client has been updated');
    }

    public function delete($id)
    {
        $client=Client::where('id',$id)->first();

        if($client==null)
        {
            return redirect()->back()->with('error','Record not found');
        }
        $client->delete();

        return redirect()->route('client.list')->with('success','Client has been deleted');
    }
}
