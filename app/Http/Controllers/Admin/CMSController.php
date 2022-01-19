<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CMSController extends Controller
{
    public function webCMS()
    {
        return view('admin.cms.general');
    }

    public function saveCMS(Request $request)
    {
        $setting = $request->except('_token');
        foreach ($setting as $key => $value) {
            if (empty($value))
                continue;
            $set = Setting::where('name', $key)->first() ?: new Setting();
            $set->name = $key;
            $set->setting = $value;
            $set->save();

            if ($request->hasFile($key)) {
                $existing = Setting::where('name', '=', $key)->first();
                if ($existing) {
                    $ex_path = "cms/home/" . $existing->setting;
                    if (File::exists($ex_path)) {
                        File::delete($ex_path);
                    }
                    $image = $request->file($key);
                    $name = $image->getClientOriginalName();
                    $image->move('cms/home', $name);
                    Setting::where('name', '=', $key)->update([
                        'setting' => "/cms/home/" . $name
                    ]);
                }
            }
        }
        return redirect()->back()->with('message', 'The setting is created successfully');
    }
}
