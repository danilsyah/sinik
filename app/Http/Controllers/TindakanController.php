<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TindakanRequest;;
use App\Models\Tindakan;


class TindakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tindakans = Tindakan::all();

        return view('pages.tindakan.index', [
            'tindakans' => $tindakans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.tindakan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TindakanRequest $request)
    {
        $data = $request->all();
        Tindakan::create($data);

        return redirect()->route('tindakans.index');
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
        $tindakan = Tindakan::findOrFail($id);
        return view('pages.tindakan.edit', ['tindakan' => $tindakan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TindakanRequest $request, $id)
    {
        $data = $request->all();
        $tindakan = Tindakan::findOrFail($id);
        $tindakan->update($data);

        return redirect()->route('tindakans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tindakan = Tindakan::findOrFail($id);
        $tindakan->delete();

        return redirect()->route('tindakans.index');
    }
}
