<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegencyRequest;
use Illuminate\Http\Request;
use App\Models\Regency;
use App\Models\Province;


class RegencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regencies = Regency::with(['province'])->get();
        return view('pages.wilayah.kabupaten.index', ['regencies' => $regencies]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Province::all();
        return view('pages.wilayah.kabupaten.create', ['provinces' => $provinces]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegencyRequest $request)
    {
     $data = $request->all();
     Regency::create($data);

     return redirect()->route('regencies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regency = Regency::findOrFail($id);
        $provinces = Province::all();

        return view('pages.wilayah.kabupaten.edit', ['regency' => $regency, 'provinces'=> $provinces]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RegencyRequest $request, $id)
    {
        $data = $request->all();
        $regency = Regency::findOrFail($id);
        $regency->update($data);

        return redirect()->route('regencies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $regency = Regency::findOrFail($id);
        $regency->delete();

        return redirect()->route('regencies.index');
    }
}
