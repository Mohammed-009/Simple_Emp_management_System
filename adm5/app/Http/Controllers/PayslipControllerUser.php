<?php

namespace App\Http\Controllers;

use App\Models\Payslip;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use Illuminate\Support\Facades\Auth;

class PayslipControllerUser extends Controller
{
    //
    public function EmployeePayslip()
    {
        $user= Auth::user();
        $payslip= $user->payslips;
        return view('UserEmployeePayslip.fetch')->with('payslips', $payslip);

    }
}
