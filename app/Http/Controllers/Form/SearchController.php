<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use App\Models\CareGiver;
use App\Models\Locality;
use App\Models\Province;
use App\Models\County;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function findLocality($county_id)
    {
        $localities=Locality::where('county_id',$county_id)->get();
        return view('ajax.form.locality-dropdown',get_defined_vars());
    }

    public function findProvince($county_id)
    {
        $county=County::find($county_id);
        return response()->json($county->province->province);
        // return view('ajax.form.province-dropdown',get_defined_vars());
    }

    public function findCareGiver($care_giver_id)
    {
        
        $care_giver=CareGiver::where('id_number',$care_giver_id)->first();
        if ($care_giver)
        {
            $name=$care_giver->name;
        }
        else{
            $name='error_display';
        }


        return response()->json([$name]);
    }

    public function findCareManager($care_manager_id)
    {
        $manager=User::where('id',$care_manager_id)->where('role','care_manager')->first();
        $name=$manager->name;

        return response()->json([$name]);
    }
}
