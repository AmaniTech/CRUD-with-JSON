<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = Storage::get('public/data.json');
        $data = json_decode($file);

        $data[] = [
            'id' => $request->id,
            'nama' => $request->nama,
            'npm' => $request->npm,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        $jsonfile = json_encode($data, JSON_PRETTY_PRINT);
        $file = Storage::put('public/data.json', $jsonfile);

        return redirect('/')->with('status', 'Data Berhasil Masuk!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $file = Storage::get('public/data.json');
        $data = json_decode($file);

        $jsonfile = $data[$id - 1];

        return view('pageEdit', [
            'data' => $jsonfile,
        ]);
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
        $file = Storage::get('public/data.json');
        $data = json_decode($file);

        $data[$id - 1] = array(
            'id' => $id,
            'nama' => $request->nama,
            'npm' => $request->npm,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
        );

        $jsonfile = json_encode($data, JSON_PRETTY_PRINT);
        $file = Storage::put('public/data.json', $jsonfile);

        return redirect('/')->with('status', 'Data Berhasil Dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = Storage::get('public/data.json');
        $data = json_decode($file);

        unset($data[$id - 1]);

        $jsonfile = json_encode($data, JSON_PRETTY_PRINT);
        $file = Storage::put('public/data.json', $jsonfile);

        return redirect('/')->with('status', 'Data Berhasil Dihapus!');
    }
}
