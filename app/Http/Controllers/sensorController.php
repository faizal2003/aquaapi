<?php

namespace App\Http\Controllers;
use App\Events\ValEvent;
use App\Events\PhEvent;
use App\Events\phfir;
use App\Events\tdsEvent;
use App\Events\tempEvent;
use App\Events\turbidEvent;
use App\Events\WlEvent;
use App\Http\Resources\SenResource;
use App\Models\phman;
use App\Models\Sen_ec;
use App\Models\sen_ph;
use App\Models\Sen_wl;
use App\Models\tds;
use App\Models\temp;
use App\Models\turbid;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\Http;
use Kreait\Laravel\Firebase\Facades\Firebase;

class sensorController extends Controller
{
     public function indexph()
    {
        // $coll = Sen_ec::latest('id')->take(5)->get();
        // $vals = $coll->pluck('val');
        // $aidi = $coll->pluck('id');
        // $ecval = ["val"=>$vals, "id"=>$aidi];
        // // dd($aidi);
        // ValEvent::dispatch($vals, $aidi);
        return view('tablemanph');}
     public function indextds()
    {
        // $coll = Sen_ec::latest('id')->take(5)->get();
        // $vals = $coll->pluck('val');
        // $aidi = $coll->pluck('id');
        // $ecval = ["val"=>$vals, "id"=>$aidi];
        // // dd($aidi);
        // ValEvent::dispatch($vals, $aidi);
        return view('tablemantds');}
     public function indextemp()
    {
        // $coll = Sen_ec::latest('id')->take(5)->get();
        // $vals = $coll->pluck('val');
        // $aidi = $coll->pluck('id');
        // $ecval = ["val"=>$vals, "id"=>$aidi];
        // // dd($aidi);
        // ValEvent::dispatch($vals, $aidi);
        return view('tablemantds');}
     public function indexturbid()
    {
        // $coll = Sen_ec::latest('id')->take(5)->get();
        // $vals = $coll->pluck('val');
        // $aidi = $coll->pluck('id');
        // $ecval = ["val"=>$vals, "id"=>$aidi];
        // // dd($aidi);
        // ValEvent::dispatch($vals, $aidi);
        return view('tablemanturbid');}
    
   
}