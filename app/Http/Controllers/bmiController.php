<?php

namespace App\Http\Controllers;

use App\Models\bmi;
use App\Models\recommend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class bmiController extends Controller
{
    public function index()
    {
        $bmi = bmi::all();
        $user = Auth::user();

        return view('bmi', ['$bmi' => $bmi, 'user' => $user]);
    }
    public function calculateBMI(Request $request)
    {
        // รับค่าน้ำหนักและส่วนสูงจากผู้ใช้
        $weight = $request->input('weight');
        $height = $request->input('height');

        // คำนวณ BMI

        $bmi =  $weight / (($height / 100) * ($height / 100));

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
        return view('bmi', ['bmi' => $bmi, 'status' => $status, 'weight' => $weight, 'height' => $height]);
    }

    public function savebmi(Request $request)
    {

        // บันทึกข้อมูลลงในตาราง bmi ในฐานข้อมูล
        $user = Auth::user();
        $bmis = new bmi();
        $bmis->weight = $request->input('weight');
        $bmis->height = $request->input('height');
        $bmis->bmi = $request->input('bmi');
        $bmis->user_id = $user->id; // เชื่อมความสัมพันธ์กับผู้ใช้
        $bmis->save();
        // หลังจากบันทึกข้อมูลเสร็จสิ้น คุ redirect ไปยังหน้าbmi
        return redirect ('recommend');
    }


    public function recommend()
    {
        $user = Auth::user();
        $recommends = recommend::all();
        $bmis = bmi::all();

        return view('recommend', compact(
            'bmis',
            'user',
            'recommends'
        ));
    }
    public function recommendpro()
    {
        $user = Auth::user();
        $recommends = recommend::all();
        $bmis = bmi::all();

        return view('recommendpro', compact('bmis', 'user', 'recommends'));
    }

    public function deletebmi($id)
    {
        // ลบข้อมูลbmi(Soft Delete)
        $bmi = bmi::find($id);
        if ($bmi) {
            $bmi->delete();
        }


        return redirect('/recommend');
    }
}
