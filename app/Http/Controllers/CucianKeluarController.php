<?php

namespace App\Http\Controllers;

use App\Models\cucian_keluar;
use Illuminate\Http\Request;
USE Session;

class CucianKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Cuciankeluar = cucian_keluar::all();
        return view('Cuciankeluar.index', compact('Cuciankeluar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cuciankeluar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // validasi data
       $validated = $request->validate([
        'name' => 'required',
    ]);

    $Cuciankeluar = new Cuciankeluar;
    $Cuciankeluar->name = $request->name;
    $Cuciankeluar->save();
    return redirect()->route('Cuciankeluar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cucian_keluar  $cucian_keluar
     * @return \Illuminate\Http\Response
     */
    public function show(cucian_keluar $cucian_keluar)
    {
        $Cuciankeluar = Cuciankeluar::findOrFail($id);
        return view('admin.Cuciankeluar.show', compact('Cuciankeluar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cucian_keluar  $cucian_keluar
     * @return \Illuminate\Http\Response
     */
    public function edit(cucian_keluar $cucian_keluar)
    {
        $Cuciankeluar = Cuciankeluar::findOrFail($id);
        return view('admin.Cuciankeluar.show', compact('Cuciankeluar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cucian_keluar  $cucian_keluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cucian_keluar $cucian_keluar)
    {
       // validasi data
       $validated = $request->validate([
        'name' => 'required',
    ]);

    $Cuciankeluar = Cuciankeluar::findOrFail($id);
    $Cuciankeluar->name = $request->name;
    $Cuciankeluar->save();
    return redirect()->route('Cuciankeluar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cucian_keluar  $cucian_keluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(cucian_keluar $cucian_keluar)
    {
        $Cuciankeluar = Cuciankeluar::findOrFail($id);
        $Cuciankeluar->delete();
        return redirect()->route('Cuciankeluar.index');
    }
}
