<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campain;
use App\Imports\CampainsImport;
use Maatwebsite\Excel\Facades\Excel;

class CampainController extends Controller
{
    public function list(){
        $discount_codes = Campain::get();
        return view('discount_codes', ['discount_codes'=>$discount_codes]);
    }

    public function import_discount_code(Request $request){
        ini_set('max_execution_time', 3600);
        $request->validate([
            'excel_file'=>'required|csv',
        ]);

        Excel::import(new CampainsImport, $request->file('excel_file'));
        return redirect()->back()->with('success', 'Discount codes successfully imported!');
    }
}
