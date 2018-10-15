<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Companies;
use App\Employees;
use App\Qualifications;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalComp = Companies::count();
        $totalEmpl = Employees::count();
        $totalQual = Qualifications::count();
        return view('home', ['totalComp' => $totalComp, 'totalEmpl' => $totalEmpl, 'totalQual' => $totalQual]);
    }
}
