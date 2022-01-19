<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CareManagerController extends Controller
{
    public function list()
    {
        $managers=User::where('role','care_manager')->withTrashed()->get();
        return view('admin.care-manager.list',get_defined_vars());
    }

    public function add()
    {
        return view('admin.care-manager.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'comment' => 'required|string|max:255',
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
            'comment'=>$request->comment,
            'avatar'=>$image,
            'role'=>$request->role,
            'password' => Hash::make($request->password),
        ]);
        UserProfile::create([
            'user_id'=>$user->id,
        ]);
        return redirect()->route('admin.caremanager.list')->with('success','CAREManager has been added.');

    }

    public function edit($id)
    {
        $user=User::where('id',$id)->first();

        return view('admin.care-manager.edit',get_defined_vars());
    }

    public function update(Request $request)
    {


        $request->validate([
            'id'=>'required',
            'name' => 'required|string|max:255',
            'comment' => 'required|string|max:255',
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
            'comment'=>$request->comment,
            'email'=>$request->email,
            'avatar'=>$image,
        ]);

        return redirect()->route('admin.caremanager.list')->with('success','CAREManager has been updated.');

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
        return redirect()->back()->with('success','CAREManager has been deleted');
    }

    public function archive($id)
    {
        $county=User::where('id',$id)->first();
        if($county==null)
        {
            return redirect()->back()->with('error','Record not found');
        }
        $county->delete();
        return redirect()->back()->with('success','CAREManager has been Archived');
    }

    public function unarchive($id)
    {
        $county=User::where('id',$id)->withTrashed()->first();
        if($county==null)
        {
            return redirect()->back()->with('error','Record not found');
        }
        $county->restore();
        return redirect()->back()->with('success','CAREManager has been UnArchived');
    }

    public function suspend($id)
    {
        $county=User::where('id',$id)->withTrashed()->first();
        if($county==null)
        {
            return redirect()->back()->with('error','Record not found');
        }
        $county->update(['status'=>'Suspend']);
        return redirect()->back()->with('success','CAREManager has been suspended');
    }

    public function active($id)
    {
        $county=User::where('id',$id)->withTrashed()->first();
        if($county==null)
        {
            return redirect()->back()->with('error','Record not found');
        }
        $county->update(['status'=>'Active']);
        return redirect()->back()->with('success','CAREManager has been active');
    }
}
