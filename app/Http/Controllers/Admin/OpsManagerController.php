<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use App\Models\UserProfile;

class OpsManagerController extends Controller
{
    public function list(Request $req)
    {
    	$managers = User::where("role", "ops_manager")
    		->get();
		return view("admin.ops-manager.list", get_defined_vars());
    }

    public function add()
    {
        return view('admin.ops-manager.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
        $image='uploads/users/default.png';
        if ($request->hasFile('image'))
        {
            $name = time().'-'.str_replace(' ', '-', $request->image->getClientOriginalName());
            $request->image->move('uploads/users',$name);
            $image='uploads/users'.'/'.$name;
        }

        $user=User::create([
            'name' => $request->name,
            'email' => $request->email,
            'avatar'=>$image,
            'role'=>$request->role,
            'password' => Hash::make($request->password),
        ]);
        UserProfile::create([
            'user_id'=>$user->id,
        ]);
        return redirect()->route('admin.ops_manager.list')->with('success','Admin has been added.');

    }

    public function edit($id)
    {
        $user=User::where('id',$id)->first();
        return view('admin.ops-manager.edit',get_defined_vars());
    }

    public function update(Request $request)
    {
        $request->validate([
            'id'=>'required',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);
        $up_user=User::where('id',$request->id)->first();
        $image=$up_user->avatar;
        if ($request->hasFile('image'))
        {
            $name = time().'-'.str_replace(' ', '-', $request->image->getClientOriginalName());
            $request->image->move('uploads/users',$name);
            $image='uploads/users'.'/'.$name;
        }
        User::where('id',$request->id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'avatar'=>$image,
        ]);

        return redirect()->route('admin.ops_manager.list')->with('success','Admin has been updated.');

    }

    public function delete($id)
    {
        $county=User::where('id',$id)->withTrashed()->first();
        if($county==null)
        {
            return redirect()->back()->with('error','Record not found');
        }
        foreach ($county->clients as $client)
        {
            $client->update(['care_manager_id'=>null]);
        }
        $county->forceDelete();
        return redirect()->back()->with('success','Admin has been deleted');
    }
}
