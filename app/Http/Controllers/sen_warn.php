<?php

namespace App\Http\Controllers;

use App\Models\Sens_warn;
use Illuminate\Http\Request;

class sen_warn extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
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

    public function setwarn($sensor)
    {
        $checkiswarn = Sens_warn::where('sensr', $sensor)->first();
        // var_dump($checkiswarn->is_warn);

        if ($checkiswarn->is_warn == 0){
            Sens_warn::where('sensr', $sensor)
          ->update(['is_warn' => 1]);
        //   var_dump("hello");
        }
        // set sensor warn to 1
    }

    public function unsetwarn($sensor)
    {
        // set sensor warn to 0 
         $checkiswarn = Sens_warn::where('sensr', $sensor)->first();
        // var_dump($checkiswarn->is_warn);

        if ($checkiswarn->is_warn == 1){
            Sens_warn::where('sensr', $sensor)
          ->update(['is_warn' => 0]);
        //   var_dump("hello");
        }
    }
}