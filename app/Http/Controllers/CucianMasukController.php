<?php

namespace App\Http\Controllers;

use App\Models\cucian_masuk;
use Illuminate\Http\Request;

class CucianMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // mengambil data 'book' dan juga 'author'
        // yang berelasi melalui method 'author'
        // yang berasal dari model 'Book'
        $Cucianmasuk= Cucianmasuk::with('Ccuciankeluar')->get();
        return view('admin.Cucianmasuk.index', compact('Cuciankeluar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mengambil data author
        $Cuciankeluar = Cuciankeluar::all();
        return view('admin.Cucianmasuk.create', compact('Cuciankeluar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:Cucianmasuk',
            'amount' => 'required',
            'author_id' => 'required',
            'cover' => 'required|image|max:2048',
        ]);

        $Cucianmasuk = new Cucianmasuk;
        $Cucianmasuk->kd_konsumen = $request->tanggal_cucian_masuk;
        $Cucianmasuk->Cuciankeluar_id = $request->Cuciankeluar_id;
        
        $Cucianmasuk->amount = $request->amount;
        $Cucianmasuk->save();
        return redirect()->route('Cucianmasuk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cucian_masuk  $cucian_masuk
     * @return \Illuminate\Http\Response
     */
    public function show(cucian_masuk $cucian_masuk)
    {
        $Cucianmasuk = Cucianmasuk::findOrFail($id);
        return view('admin.Cucianmasuk.show', compact('Cucianmasuk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cucian_masuk  $cucian_masuk
     * @return \Illuminate\Http\Response
     */
    public function edit(cucian_masuk $cucian_masuk)
    {
        $Cucianmasuk = Cucianmasuk::findOrFail($id);
        $Cuciankeluar = Cuciankeluar::all();
        return view('admin.Cucianmasuk.edit', compact('Cucianmasuk', 'Cuciankeluar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cucian_masuk  $cucian_masuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cucian_masuk $cucian_masuk)
    {
        $request->validate([
            'title' => 'required',
            'amount' => 'required',
            'author_id' => 'required',
        ]);

        $Cucianmasuk = Cucianmasuk::findOrFail($id);
        $Cuciankeluar->id_konsumen = $request->tanggal_cucian_keluar;
        $Cucianmasuk->Cuciankeluar_id = $request->author_id;
        // upload image / foto
        if ($request->hasFile('cover')) {
            $Cucianmasuk->deleteImage();
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/Cucianmasuk/', $name);
            $Cucianmasuk->cover = $name;
        }
        $Cucianmasuk->amount = $request->amount;
        $Cucianmasuk->save();
        return redirect()->route('Cucianmasuk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cucian_masuk  $cucian_masuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(cucian_masuk $cucian_masuk)
    {
        $Cucianmasuk = Cucianmasuk::findOrFail($id);
        $Cucianmasuk->deleteImage();
        $Cucianmasuk->delete();
        return redirect()->route('Cucianmasuk.index');
    }
}
