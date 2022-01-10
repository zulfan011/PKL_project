<?php

namespace App\Http\Controllers;

use App\Models\konsumen;
use Illuminate\Http\Request;

class KonsumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $konsumen = konsumen::all();
        return view('konsumen.index', compact('konsumen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $konsumen = konsumen::all();
        return view('konsumen.create', compact('konsumen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\konsumen  $konsumen
     * @return \Illuminate\Http\Response
     */
    public function show(konsumen $konsumen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\konsumen  $konsumen
     * @return \Illuminate\Http\Response
     */
    public function edit(konsumen $konsumen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\konsumen  $konsumen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, konsumen $konsumen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\konsumen  $konsumen
     * @return \Illuminate\Http\Response
     */
    public function destroy(konsumen $konsumen)
    {
        //
    }
}
