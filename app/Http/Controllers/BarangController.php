<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DataTables;

class BarangController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.content.barang.barang_list');
    }

    function all(){
        $data = file_get_contents("http://dubin.tintamerdeka.co.id/api_dubin/processor/admin/readAll.php");
        $data = json_decode($data);
        // return dd($data->records);

        return Datatables::of(collect($data->records))->toJson(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.content.barang.barang_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'pemilik' => 'required',
            'no_rumah' => 'required',
            'no_rt' => 'required|numeric',
            'qty' => 'required|numeric',
            'ekspedisi' => 'required'
        ]);

        $response = Http::post('http://dubin.tintamerdeka.co.id/api_dubin/processor/admin/create.php', [
            'pemilik' => $request->pemilik,
            'no_rumah' => $request->no_rumah,
            'no_rt' => $request->no_rt,
            'qty' => $request->qty,
            'ekspedisi' => $request->ekspedisi,
            'pj_masuk' => $request->pj_masuk
        ]);

        if($response->getStatusCode() == 201){
            return redirect('/barang')->with(['status' => 'success']);
        } else {
            return redirect('/barang')->with(['status' => 'error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = file_get_contents("http://dubin.tintamerdeka.co.id/api_dubin/processor/client/findById.php?id=".$id);
        $data = json_decode($data);

        return view('admin.content.barang.barang_edit', ['data' => $data->records[0]]);
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
        $this->validate($request, [
            'pemilik' => 'required',
            'no_rumah' => 'required',
            'no_rt' => 'required|numeric',
            'qty' => 'required|numeric',
            'ekspedisi' => 'required'
        ]);

        $response = Http::post('http://dubin.tintamerdeka.co.id/api_dubin/processor/admin/editOne.php', [
            'id' => $id,
            'pemilik' => $request->pemilik,
            'no_rumah' => $request->no_rumah,
            'no_rt' => $request->no_rt,
            'qty' => $request->qty,
            'ekspedisi' => $request->ekspedisi
        ]);

        // return dd($response->getStatusCode());

        if ($response->getStatusCode() == 201) {
            return redirect()->route('barang.index')->with(['status' => 'success']);
        } else {
            return redirect()->route('barang.index')->with(['status' => 'error']);
        }
    }

    public function ambilBarang(Request $request, $id)
    {
        $this->validate($request, [
            'penerima' => 'required'
        ]);

        $response = Http::post('http://dubin.tintamerdeka.co.id/api_dubin/processor/admin/updatePaketKeluar.php', [
            'penerima' => $request->penerima,
            'pj_keluar' => $request->keluar,
            'id' => $id
        ]);

        if ($response->getStatusCode() == 200) {
            return redirect()->route('barang.index')->with(['status' => 'success']);
        } else {
            return redirect()->route('barang.index')->with(['status' => 'error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::post("http://dubin.tintamerdeka.co.id/api_dubin/processor/admin/deleteOne.php", [
            'id' => $id
        ]);

        if ($response->getStatusCode() == 200) {
            return redirect()->route('barang.index')->with(['status' => 'success']);
        } else {
            return redirect()->route('barang.index')->with(['status' => 'error']);
        }
    }
}
