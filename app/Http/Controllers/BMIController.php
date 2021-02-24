<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BMIController extends Controller
{
    /**
     * Menampilkan halaman awal 
     * @return view home
     */
    public function index(){
        return view("home");
    }

    /**
     * Menghitung BMI
     * @param Request $request
     * @return redirect ke halaman awal dengan memberikan session hasil
     */
    public function hitung(Request $request){

        // Validasi form input
        $request->validate([
            "berat_badan" => 'required|gt:0|lt:500',
            "tinggi_badan" => 'required|gt:0|lt:300',
        ]);

        $berat_badan = $request->get("berat_badan");
        $tinggi_badan_in_cm = $request->get("tinggi_badan");
        // Konversi tinggi badan dari cm ke m
        $tinggi_badan_in_meters = $tinggi_badan_in_cm/100;

        // Hitung BMI
        $bmi = $berat_badan / pow($tinggi_badan_in_meters,2);

        // Bulatkan sampai 2 desimal
        $bmi = round($bmi,2);

        // Return redirect ke alamat root
        return redirect("/")->with("hasil_bmi",$bmi);
    }
}
