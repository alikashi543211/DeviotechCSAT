<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SingleExcelExport implements FromView
{
	protected $clients;
    function __construct($clients)
    {
    	$this->clients = $clients;
    }
	public function view(): View
	{
		return view('exports.clients_excel_export', [
			'clients'=>$this->clients
		]);
	}
}
