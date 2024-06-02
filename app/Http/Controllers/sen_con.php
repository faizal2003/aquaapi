<?php

namespace App\Http\Controllers;

use App\Events\ValEvent;
use App\Events\PhEvent;
use App\Events\WlEvent;
use App\Http\Resources\SenResource;
use App\Models\feed;
use App\Models\Sen_ec;
use App\Models\sen_ph;
use App\Models\Sen_wl;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class sen_con extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $coll = Sen_ec::latest('id')->take(5)->get();
        // $vals = $coll->pluck('val');
        // $aidi = $coll->pluck('id');
        // $ecval = ["val"=>$vals, "id"=>$aidi];
        // // dd($aidi);
        // ValEvent::dispatch($vals, $aidi);
        return view('table');
    }

    public function indexph()
    {
        // $coll = Sen_ec::latest('id')->take(5)->get();
        // $vals = $coll->pluck('val');
        // $aidi = $coll->pluck('id');
        // $ecval = ["val"=>$vals, "id"=>$aidi];
        // // dd($aidi);
        // ValEvent::dispatch($vals, $aidi);
        return view('tableph');
    }
    public function indexwl()
    {
        // $coll = Sen_ec::latest('id')->take(5)->get();
        // $vals = $coll->pluck('val');
        // $aidi = $coll->pluck('id');
        // $ecval = ["val"=>$vals, "id"=>$aidi];
        // // dd($aidi);
        // ValEvent::dispatch($vals, $aidi);
        return view('tablewl');
    }
    public function getph()
    {
        $ph = DB::table('sen_phs')->orderBy('id', 'DESC')->first();
        $coll = Sen_ph::latest('id')->take(1)->get();
        $vals = $coll->pluck('val');
        
        return response()->json(
            $ph
        );
    }
    public function getec()
    {
        $ec = DB::table('sen_ecs')->orderBy('id', 'DESC')->first();
        $coll = Sen_ph::latest('id')->take(1)->get();
        $vals = $coll->pluck('val');
        
        return response()->json(
            $ec
        );
    }
    public function getwl()
    {
        $wl = DB::table('sen_wls')->orderBy('id', 'DESC')->first();
        $coll = Sen_ph::latest('id')->take(1)->get();
        $vals = $coll->pluck('val');
        
        return response()->json(
            $wl
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $now = SupportCarbon::now('Asia/Jakarta')->toTimeString();
        // $sen = Sen_ec::create([
        //     'val' => $request->val,
        //     'created_at' => $now
        // ]);
        // return new SenResource(true, 'add success', $sen);
        // $ecval = Sen_ec::latest('id')->take(5)->get();
        // $vals = $coll->pluck('val');
        // $aidi = $coll->pluck('id');
        // $ecval = ["val"=>$vals, "id"=>$aidi];
        // var_dump($ecval);
        // event(new ValEvent($coll));
        // ValEvent::dispatch($ecval);
        $sen = new Sen_ec;
        $sen->val = $request->val;
        $sen->time = $now;
        $sen->save();
        $coll = Sen_ec::latest('id')->take(5)->get();
        $vals = $coll->pluck('val');
        // Http::get('localhost:3000/'+$vals);
        if ($request->val >= 7) {
            # code...
            Http::get('aquaapi.test/warn/ec');
        }else {
            # code...
            Http::get('aquaapi.test/unwarn/ec');
        }
        $aidi = $coll->pluck('time');
        // $dt = Carbon::createFromTimestamp('m/d/Y h:i a', $aidi)->toDateTimeString();
        //var_dump($aidi);
        $ecval = ["val"=>$vals, "id"=>$aidi];
        
        // dd($aidi);
        ValEvent::dispatch($vals, $aidi);

    }

    public function storeph(Request $request)
    {
        $now = SupportCarbon::now('Asia/Jakarta')->toTimeString();
        $ph = new sen_ph;
        $ph->val = $request->val;
        $ph->time = $now;
        $ph->save();

        $coll = sen_ph::latest('id')->take(5)->get();
        $vals = $coll->pluck('val');
        if ($request->val > 7) {
            # code...
            Http::get('aquaapi.test/warn/phd');
            Http::get('aquaapi.test/unwarn/phu');
        }elseif ($request->val < 5) {
            # code...
            Http::get('aquaapi.test/warn/phu');
            Http::get('aquaapi.test/unwarn/phd');
        }else {
            Http::get('aquaapi.test/unwarn/phu');
            Http::get('aquaapi.test/unwarn/phd');
            # code...
        }
        // Http::get('localhost:3000/'+$vals);
        $aidi = $coll->pluck('time');
        // $dt = Carbon::createFromTimestamp('m/d/Y h:i a', $aidi)->toDateTimeString();
        //var_dump($aidi);
        $ecval = ["val"=>$vals, "id"=>$aidi];
        
        // dd($aidi);
        PhEvent::dispatch($vals, $aidi);
    }

    public function storewl(Request $request)
    {
        $now = SupportCarbon::now('Asia/Jakarta')->toTimeString();
        $wl = new Sen_wl;
        $wl->val = $request->val;
        $wl->time = $now;
        $wl->save();

        $coll = Sen_wl::latest('id')->take(5)->get();
        $vals = $coll->pluck('val');
        if ($request->val < 20) {
            # code...
            Http::get('aquaapi.test/warn/wl');
        }elseif ($request->val >= 30) {
            # code...
            Http::get('aquaapi.test/unwarn/wl');
        }
        // Http::get('localhost:3000/'+$vals);
        $aidi = $coll->pluck('time');
        // $dt = Carbon::createFromTimestamp('m/d/Y h:i a', $aidi)->toDateTimeString();
        //var_dump($aidi);
        $ecval = ["val"=>$vals, "id"=>$aidi];
        
        // dd($aidi);
        WlEvent::dispatch($vals, $aidi);
    }

    public function feeder(Request $request)
    {
        // $now = SupportCarbon::now('Asia/Jakarta')->toTimeString();
        // $feedd = feed::all();

        
            $feede = feed::find(1);
 
            $feede->feed1 = $request->feed1;
            $feede->feed2 = $request->feed2;
 
            $feede->save();
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}