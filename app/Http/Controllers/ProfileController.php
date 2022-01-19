<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
	public function profile()
	{
		$user = Auth::user();
		if($user->role=="admin")
		{
			return view('admin.profile.profile',get_defined_vars());
		}
		else
		{
			return view('care-manager.profile.profile',get_defined_vars());
		}
	}
	public function resetPassoord()
	{
		$user = Auth::user();
		if($user->role=="admin")
		{
			return view('admin.profile.reset-password',get_defined_vars());
		}
		else
		{
			return view('care-manager.profile.reset-password',get_defined_vars());
		}
	}

	public function profileUpdate(Request $request)
	{
		
		$user = Auth::user();
		if($request->name)
		{
			$user->name = $request->name;
		}
		if($request->email)
		{
			$request->validate([
				'email' =>'required|email',
			]);
			$user->email = $request->email;
		}
		if ($request->oldpassword) {
			$this->validate($request, [
				'oldpassword' => 'required',
				'newpassword'  => 'required|min:8',
				'confirm_password' =>'required|same:newpassword'
			]);
			$user->password = Hash::make($request->newpassword);
			$user->save();
			Auth::logout();
			return redirect('/');
		}
		if($request->hasfile('image') || $request->avatar)
		{
			$user->avatar = "uploads/users/default.png";
			$user->save();

			$image = $request->avatar;
			$filename = time() . '.' . $image->getClientOriginalExtension();
			$movedFile = $image->move(base_path('images'), $filename);
			$user->avatar = 'images/'.$filename;
			$user->save();
		}
		else {
			$user->save();
		}
		return redirect()->back()->with('success','Profile Updated successfully');
	}
}
