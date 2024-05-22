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
    public function storeph(Request $request)
    {
        $now = SupportCarbon::now('Asia/Jakarta')->toTimeString();
        $ph = new phman;
        $ph->val = $request->val;
        $ph->time = $now;
        $ph->save();

        $coll = phman::latest('id')->take(5)->get();
        $vals = $coll->pluck('val');
        // Http::get('localhost:3000/'+$vals);
        $aidi = $coll->pluck('time');
        // $dt = Carbon::createFromTimestamp('m/d/Y h:i a', $aidi)->toDateTimeString();
        //var_dump($aidi);
        $ecval = ["val"=>$vals, "id"=>$aidi];
        
        // dd($aidi);
        phfir::dispatch($vals, $aidi);
    }
    public function storetds(Request $request)
    {
        $now = SupportCarbon::now('Asia/Jakarta')->toTimeString();
        $ph = new tds;
        $ph->val = $request->val;
        $ph->time = $now;
        $ph->save();

        $coll = tds::latest('id')->take(5)->get();
        $vals = $coll->pluck('val');
        // Http::get('localhost:3000/'+$vals);
        $aidi = $coll->pluck('time');
        // $dt = Carbon::createFromTimestamp('m/d/Y h:i a', $aidi)->toDateTimeString();
        //var_dump($aidi);
        $ecval = ["val"=>$vals, "id"=>$aidi];
        
        // dd($aidi);
        tdsEvent::dispatch($vals, $aidi);
    }
    public function storetemp(Request $request)
    {
        $now = SupportCarbon::now('Asia/Jakarta')->toTimeString();
        $ph = new temp;
        $ph->val = $request->val;
        $ph->time = $now;
        $ph->save();

        $coll = temp::latest('id')->take(5)->get();
        $vals = $coll->pluck('val');
        // Http::get('localhost:3000/'+$vals);
        $aidi = $coll->pluck('time');
        // $dt = Carbon::createFromTimestamp('m/d/Y h:i a', $aidi)->toDateTimeString();
        //var_dump($aidi);
        $ecval = ["val"=>$vals, "id"=>$aidi];
        
        // dd($aidi);
        tempEvent::dispatch($vals, $aidi);
    }
    public function storeturbid(Request $request)
    {
        $now = SupportCarbon::now('Asia/Jakarta')->toTimeString();
        $ph = new turbid;
        $ph->val = $request->val;
        $ph->time = $now;
        $ph->save();

        $coll = turbid::latest('id')->take(5)->get();
        $vals = $coll->pluck('val');
        // Http::get('localhost:3000/'+$vals);
        $aidi = $coll->pluck('time');
        // $dt = Carbon::createFromTimestamp('m/d/Y h:i a', $aidi)->toDateTimeString();
        //var_dump($aidi);
        $ecval = ["val"=>$vals, "id"=>$aidi];
        
        // dd($aidi);
        turbidEvent::dispatch($vals, $aidi);
    }
}