<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ClientExport implements FromView
{
	protected $clients;
    function __construct($clients)
    {
    	$this->clients = $clients;
    }
	public function view(): View
	{
		return view('exports.clients', [
			'clients'=>$this->clients
		]);
	}
}
