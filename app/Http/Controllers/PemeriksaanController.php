<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PemeriksaanRequest;
use App\Models\Pasien;
use App\Models\Employee;
use App\Models\Pemeriksaan;
use App\Models\PemeriksaanDetail;
use App\Models\Tindakan;
use App\Models\Obat;

class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemeriksaans = Pemeriksaan::with(['employee', 'pasien'])->get();

        return view ('pages.pemeriksaan.index', [
            'pemeriksaans' => $pemeriksaans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pasiens = Pasien::all();
        $employees = Employee::all();

        return view('pages.pemeriksaan.create', [
            'pasiens' => $pasiens,
            'employees' => $employees,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PemeriksaanRequest $request)
    {
        $data= $request->all();
        Pemeriksaan::create($data);

        return redirect()->route('pemeriksaans.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pemeriksaan = Pemeriksaan::findOrFail($id);
        $obats = Obat::all();
        $tindakans = Tindakan::all();

        return view('pages.pemeriksaan.pemeriksaan_detail', [
            'pemeriksaan' => $pemeriksaan,
            'obats' => $obats,
            'tindakans' => $tindakans
        ]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function tindakan(Request $request){
        // dd($request->all());
        $data = $request->all();
        PemeriksaanDetail::create($data);

        return redirect()->route('pemeriksaans.index');
    }

    public function cekTagihan($id){
        $pemeriksaanDetails = PemeriksaanDetail::with(['pemeriksaan', 'obat', 'tindakan'])->where('pemeriksaan_id', '=', $id)->get();
        // dd($pemeriksaanDetail);

        return view('pages.tagihan.index',[
            'pemeriksaanDetails' => $pemeriksaanDetails
        ]);


    }
}
