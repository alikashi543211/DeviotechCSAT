<?php

use Illuminate\Http\Request;
use App\Models\Client;
use Carbon\Carbon;


function uploadFile($file, $path){

	$name = time().'-'.str_replace(' ', '-', $file->getClientOriginalName());
	$file->move($path,$name);
	return $path.'/'.$name;
}

function changeDate($date){
    if(!empty($date)){
        return Carbon::parse($date)->format('d/m/Y');
        //return Carbon::createFromFormat('Y-m-d', $date)->format('d/m/Y');
    }else{
        return '';
    }
}

function uploadSignature($imageBase64){
    $rand = Str::random(10);
    $img = $imageBase64;
    $imgName = $rand.'.'.'png';
    $path = 'signature/'.$imgName;
    file_put_contents( public_path().'/'.$path, base64_decode($img));
    return $path;
}

function nthDecimal($value,$upto)
{
    if($value == 0)
    {
        return $value;
    }else
    {
        return  number_format((float)$value, $upto, '.', '');  // Outputs -> 105.00
    }
}

function get_client_id($id)
{
    if($id)
    {
        $cl = Client::where('id_number',$id)->first();
        if($cl)
        {
            $cl_id = $cl->id;
            return $cl_id;
        }
    }
    else
    {
        return 0;
    }
    
}

?>
