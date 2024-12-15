<?php

namespace App\Http\Controllers;

use App\Models\VaccineCenter;
use Illuminate\Http\Request;

class VaccineCenterController extends Controller
{
    public function index()  {
        $vaccine_centers = VaccineCenter::get();
        return view('vaccine_centers.index', compact('vaccine_centers'));
    }
    public function show($id)  {
        $vaccine_center = VaccineCenter::findOrFail($id);
        return view('vaccine_centers.show', compact('vaccine_center'));
    }
}
