<?php

namespace App\Http\Controllers;

use App\Events\ValEvent;
use App\Http\Resources\SenResource;
use App\Models\Sen_ec;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\Http;

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
        $aidi = $coll->pluck('time');
        // $dt = Carbon::createFromTimestamp('m/d/Y h:i a', $aidi)->toDateTimeString();
        //var_dump($aidi);
        $ecval = ["val"=>$vals, "id"=>$aidi];
        
        // dd($aidi);
        ValEvent::dispatch($vals, $aidi);

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