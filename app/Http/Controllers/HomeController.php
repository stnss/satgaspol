<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\User as U;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        date_default_timezone_set("Asia/Bangkok");
        $masuk = Http::get("http://dubin.tintamerdeka.co.id/api_dubin/processor/client/findByPaketMasuk.php?tanggal=" . Date('yy-m-d'));
        $masuk = $masuk->json();

        $keluar = Http::get("http://dubin.tintamerdeka.co.id/api_dubin/processor/client/findByPaketKeluar.php?tanggal=" . Date('yy-m-d'));
        $keluar = $keluar->json();

        $sisa = Http::get("http://dubin.tintamerdeka.co.id/api_dubin/processor/admin/readByStatus.php?status=Diterima");
        $sisa = $sisa->json();

        if(key_exists("total", $masuk)){
            $totMasuk = $masuk['total'];
        } else {
            $totMasuk = 0;
        }

        if (key_exists("total", $keluar)) {
            $totKeluar = $keluar['total'];
        } else {
            $totKeluar = 0;
        }

        return view('admin.content.home', [
            'admin' => U::all()->count(),
            'sisa' => $sisa['total'],
            'masuk' => $totMasuk,
            'keluar' => $totKeluar
        ]);
    }
}
