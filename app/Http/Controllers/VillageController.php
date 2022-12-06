<?php

namespace App\Http\Controllers;

use App\Http\Requests\VillageRequest;
use Illuminate\Http\Request;
use App\Models\Village;
use App\Models\District;

class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $villages =  Village::with(['district', 'district.regency', 'district.regency.province' ])->get();
        return view('pages.wilayah.kelurahan.index', ['villages'=> $villages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::all();
        return view('pages.wilayah.kelurahan.create', ['districts'=> $districts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VillageRequest $request)
    {
        $data = $request->all();
        Village::create($data);

        return redirect()->route('villages.index');
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
        $village = Village::findOrFail($id);
        $districts = District::all();

        return view('pages.wilayah.kelurahan.edit', ['village' =>$village, 'districts' => $districts]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VillageRequest $request, $id)
    {
        $data = $request->all();
        $village = Village::findOrFail($id);
        $village->update($data);

        return redirect()->route('villages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $village = Village::findOrFail($id);
        $village->delete();

        return redirect()->route('villages.index');
    }
}
