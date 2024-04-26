<?php

namespace App\Http\Controllers;

use App\Http\Resources\SenResource;
use App\Models\Sen_ec;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;

class sen_con extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vals = Sen_ec::pluck('val');
        $aidi = Sen_ec::pluck('id');
        return view('table', compact('vals', 'aidi'));
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
        // $now = SupportCarbon::now('Asia/Jakarta');
        // $sen = Sen_ec::create([
        //     'val' => $request->val,
        //     'created_at' => $now
        // ]);
        // return new SenResource(true, 'add success', $sen);

        $sen = new Sen_ec;
        $sen->val = $request->val;
        $sen->save();
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