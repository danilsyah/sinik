<?php

namespace App\Http\Controllers;

use App\Http\Requests\DistrictRequest;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Regency;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::with(['regency', 'regency.province'])->get();
        return view('pages.wilayah.kecamatan.index', ['districts' => $districts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regencies = Regency::all();
        return view('pages.wilayah.kecamatan.create', ['regencies' => $regencies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DistrictRequest $request)
    {
        $data = $request->all();
        District::create($data);

        return redirect()->route('districts.index');
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
        $district = District::findOrFail($id);
        $regencies = Regency::all();

        return view('pages.wilayah.kecamatan.edit', ['district' =>$district, 'regencies' => $regencies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DistrictRequest $request, $id)
    {
        $data = $request->all();
        $district = District::findOrFail($id);
        $district->update($data);

        return redirect()->route('districts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $district = District::findOrFail($id);
        $district->delete();

        return redirect()->route('districts.index');
    }
}
