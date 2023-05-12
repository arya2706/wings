<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DocumentNumberController extends Controller
{
    public static function documentNumber()
    {
        $getkd = TransactionDetail::select(DB::raw('MAX(RIGHT(document_number, 3)) AS kd_max'));
        // $personil = Personil::where('noktp', $noktp)->get();
        // $kd = '';
        // $now = Carbon::now();
        // $tahunBulan = Carbon::parse($now)->format('ym');

        if($getkd->count() >= 1) {
            foreach ($getkd->get() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "001";
        }

        return $kd;
    }
}
