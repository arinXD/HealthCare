<?php

namespace App\Http\Controllers;

use App\Models\bmi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class bmiController extends Controller
{
    public function index()
    {
        $infos = bmi::all();
        $user = Auth::user();

        return view('bmi', ['$infos' => $infos,'user'=>$user]);
    }
    public function calculateBMI(Request $request)
    {
        // รับค่าน้ำหนักและส่วนสูงจากผู้ใช้
        $weight = $request->input('weight');
        $height = $request->input('height');

        // คำนวณ BMI

        $bmi =  $weight / (($height/100) * ($height/100));

        // กำหนดเกณฑ์ของ BMI
        if ($bmi < 18.50) {
            $status = 'น้ำหนักน้อย / ผอม ';
        } elseif ($bmi >= 18.50 && $bmi <= 22.90) {
            $status = 'ปกติ (สุขภาพดี) ';
        } elseif ($bmi >= 23 && $bmi <= 24.90) {
            $status = 'ท้วม / โรคอ้วนระดับ 1';
        } elseif ($bmi >= 25 && $bmi <= 29.90) {
            $status = 'อ้วน / โรคอ้วนระดับ 2';
        } else {
            $status = 'อ้วนมาก / โรคอ้วนระดับ 3';
        }

        // ส่งผลลัพธ์กลับไปยังหน้า View
        return view('bmi', ['bmi'=>$bmi, 'status'=>$status]);
    }

}


