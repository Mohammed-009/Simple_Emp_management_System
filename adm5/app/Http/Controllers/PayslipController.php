<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Payslip;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor;

class PayslipController extends Controller
{
    public function fetchAll()
    {
        $payslips = Payslip::all();
        return view('Slip.fetch')->with('payslips', $payslips);
    }

    public function createSlip()
    {
        // return view('Slip.create_slip');
        $employees = User::all();
        return view('Slip.create_slip', compact('employees'));
    }

    public function storeDetails(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'Employee_name' => 'required',
            'Employee_number' => 'required|unique:payslips',
            'Account_number' => 'required',
            'Working_branch' => 'required',
            'Department' => 'required',
            'Date_of_joining' => 'required',
            'Designation' => 'required',
            'Pay_period' => 'required',
            'Basic_salary' => 'required',
            'Incentive_pay' => 'required',
            'House_rent_amount' => 'required',
            'Meal_allowance' => 'required',
            'Provident_fund' => 'required',
            'Professional_tax' => 'required',
            'Loan_amount' => 'required'
        ]);

        $payslip = new Payslip();
        
        // $payslip->user_id= auth()->user()->id;
        $payslip->user_id = $request->user_id;
        
        $payslip->Employee_name = $request->input('Employee_name');
        $payslip->Employee_code = $request->input('Employee_code');
        $payslip->Account_number = $request->input('Account_number');
        $payslip->Working_branch = $request->input('Working_branch');
        $payslip->Department = $request->input('Department');
        $payslip->Date_of_joining = $request->input('Date_of_joining');
        $payslip->Designation = $request->input('Designation');
        $payslip->Pay_period = $request->input('Pay_period');
        $payslip->Basic_salary = $request->input('Basic_salary');
        $payslip->Incentive_pay = $request->input('Incentive_pay');
        $payslip->House_rent_amount = $request->input('House_rent_amount');
        $payslip->Meal_allowance = $request->input('Meal_allowance');
        $payslip->Provident_fund = $request->input('Provident_fund');
        $payslip->Professional_tax = $request->input('Professional_tax');
        $payslip->Loan_amount = $request->input('Loan_amount');
        // $payslip->Total_earnings = $request->input('Total_earnings');
        $payslip->Total_earnings=$payslip->Basic_salary + $payslip->Incentive_pay + $payslip->House_rent_amount + $payslip->Meal_allowance;
        // $payslip->Total_deductions = $request->input('Total_deductions');
        $payslip->Total_deductions = $payslip->Provident_fund + $payslip->Professional_tax + $payslip->Loan_amount;
        // $payslip->Net_pay = $request->input('Net_pay');
        $payslip->Net_pay= $payslip->Basic_salary + $payslip->Incentive_pay + $payslip->House_rent_amount + $payslip->Meal_allowance - $payslip->Provident_fund - $payslip->Professional_tax - $payslip->Loan_amount;
        $payslip->save();

        return redirect('/fetch')->with('success', 'payslip created successfully');
    }

    public function editSlip($id)
    {
        $payslip = Payslip::find($id);
        return view('Slip.edit_slip')->with('payslip', $payslip);
    }

    public function updateSlip(Request $request, $id)
    {
        $request->validate([
            'Employee_name' => 'required',
            'Employee_code' => 'required',
            'Account_number' => 'required',
            'Working_branch' => 'required',
            'Department' => 'required',
            'Date_of_joining' => 'required',
            'Designation' => 'required',
            'Pay_period' => 'required',
            'Basic_salary' => 'required',
            'Incentive_pay' => 'required',
            'House_rent_amount' => 'required',
            'Meal_allowance' => 'required',
            'Provident_fund' => 'required',
            'Professional_tax' => 'required',
            'Loan_amount' => 'required'
        ]);

        $payslip = Payslip::find($id);
        $payslip->Employee_name = $request->input('Employee_name');
        $payslip->Employee_code = $request->input('Employee_code');
        $payslip->Account_no = $request->input('Account_number');
        $payslip->Working_branch = $request->input('Working_branch');
        $payslip->Department = $request->input('Department');
        $payslip->Date_of_joining = $request->input('Date_of_joining');
        $payslip->Designation = $request->input('Designation');
        $payslip->Pay_period = $request->input('Pay_period');
        $payslip->Basic_salary = $request->input('Basic_salary');
        $payslip->Incentive_pay = $request->input('Incentive_pay');
        $payslip->House_rent_amount = $request->input('House_rent_amount');
        $payslip->Meal_allowance = $request->input('Meal_allowance');
        $payslip->Provident_fund = $request->input('Provident_fund');
        $payslip->Professional_tax = $request->input('Professional_tax');
        $payslip->Loan_amount = $request->input('Loan_amount');
        // $payslip->Total_earnings = $request->input('Total_earnings');
        $payslip->Total_earnings=$payslip->Basic_salary + $payslip->Incentive_pay + $payslip->House_rent_amount + $payslip->Meal_allowance;
        // $payslip->Total_deductions = $request->input('Total_deductions');
        $payslip->Total_deductions = $payslip->Provident_fund + $payslip->Professional_tax + $payslip->Loan_amount;
        // $payslip->Net_pay = $request->input('Net_pay');
        $payslip->Net_pay= $payslip->Basic_salary + $payslip->Incentive_pay + $payslip->House_rent_amount + $payslip->Meal_allowance - $payslip->Provident_fund - $payslip->Professional_tax - $payslip->Loan_amount;
        $payslip->save();

        return redirect('/fetch')->with('success', 'payslip updated successfully');
    }

    public function deleteSlip($id)
    {
        $payslip = Payslip::find($id);
        $payslip->delete();
        return redirect('/fetch')->with('success', 'payslip deleted successfully');
    }



    public function downloadPdf($id)
    {
        
        $payslip = Payslip::where('id' , $id)->first();


        // Generate .docx file with PhpWord
        // $phpWord = new PhpWord();
        // $section = $phpWord->addSection();
        // $table = $section->addTable([
        //     'unit' => \PhpOffice\PhpWord\SimpleType\TblWidth::TWIP,
        //     'width' => 1400 * 1000,
        //     'align' => 'center'
        // ]);


        // // return $payslip->$payslip->Provident_fund;
        // $headers = ['name' => 'Book Antiqua', 'size' => 9, 'align' => 'center', 'bold' => true, 'space' => ['before' => 800, 'after' => 800, 'rule' => 'exact']];
        // $table->addRow();
        // $table->addCell(500, ['borderSize' => 1])->addText('', $headers);
        // // $table->addCell(1600, ['borderSize' => 1])->addText('ID', $headers);
        // $table->addCell(3000, ['borderSize' => 1])->addText('EARNINGS', $headers);
        // $table->addCell(1800, ['borderSize' => 1])->addText('AMOUNT', $headers);
        // $table->addCell(2000, ['borderSize' => 1])->addText('DEDUCTIONS', $headers);
        // $table->addCell(1500, ['borderSize' => 1])->addText('AMOUNT', $headers);
        // $table->addCell(1250, ['borderSize' => 1])->addText('Balance', $headers);


        // $key = 1;
        // foreach ($payslips as $key => $payslip) {
            // if ($payslip->ncpwd_no == null) {
            //     $payslip->ncpwd_no = "NONE";
            // }
        //    return $payslip->payslip;
            // $table->addRow();
            // $table->addCell(500, ['borderSize' => 1])->addText(++$key);
            // // $table->addCell(1600, ['borderSize' => 1])->addText($payslip->id);
            // $table->addCell(3000, ['borderSize' => 1])->addText('Basic', $headers);
            // $table->addCell(1600, ['borderSize' => 1])->addText($payslip->Basic_salary);
            // $table->addCell(3000, ['borderSize' => 1])->addText('Provident fund', $headers);
            // $table->addCell(1800, ['borderSize' => 1])->addText($payslip->Provident_fund);

            // $table->addRow();
            // $table->addCell(500, ['borderSize' => 1])->addText(++$key);
            // $table->addCell(3000, ['borderSize' => 1])->addText('Incentive pay', $headers);
            // $table->addCell(2000, ['borderSize' => 1])->addText($payslip->Incentive_pay);
            // $table->addCell(3000, ['borderSize' => 1])->addText('Professional tax', $headers);
            // $table->addCell(1500, ['borderSize' => 1])->addText($payslip->Professional_tax);

            // $table->addRow();
            // $table->addCell(500, ['borderSize' => 1])->addText(++$key);
            // $table->addCell(3000, ['borderSize' => 1])->addText('House allowance', $headers);
            // $table->addCell(1250, ['borderSize' => 1])->addText($payslip->House_rent_amount);
            // $table->addCell(3000, ['borderSize' => 1])->addText('Loan', $headers);
            // $table->addCell(1250, ['borderSize' => 1])->addText($payslip->Loan_amount);

            // $table->addRow();
            // $table->addCell(500, ['borderSize' => 1])->addText(++$key);
            // $table->addCell(3000, ['borderSize' => 1])->addText('Meal allowance', $headers);
            // $table->addCell(1250, ['borderSize' => 1])->addText($payslip->Meal_allowance);
            // $table->addCell(3000, ['borderSize' => 1])->addText('', $headers);
            // $table->addCell(3000, ['borderSize' => 1])->addText('', $headers);

            // $table->addRow();
            // $table->addCell(500, ['borderSize' => 1])->addText(++$key);
            // $table->addCell(3000, ['borderSize' => 1])->addText('Total earnings', $headers);
            // $table->addCell(1250, ['borderSize' => 1])->addText($payslip->Basic_salary + $payslip->Incentive_pay + $payslip->House_rent_amount + $payslip->Meal_allowance);
            // $table->addCell(3000, ['borderSize' => 1])->addText('Total deductions', $headers);
            // $table->addCell(1250, ['borderSize' => 1])->addText($payslip->Provident_fund + $payslip->Professional_tax + $payslip->Loan_amount);
            
            // $table->addRow();
            // $table->addCell(500, ['borderSize' => 1])->addText();
            // $table->addCell(3000, ['borderSize' => 1])->addText('', $headers);
            // $table->addCell(1250, ['borderSize' => 1])->addText('', $headers);
            // $table->addCell(3000, ['borderSize' => 1])->addText('Netpay', $headers);
            // $table->addCell(1250, ['borderSize' => 1])->addText($payslip->Basic_salary + $payslip->Incentive_pay + $payslip->House_rent_amount + $payslip->Meal_allowance - $payslip->Provident_fund - $payslip->Professional_tax - $payslip->Loan_amount);

            
        // }
        // ------- //
        $phpWord= new TemplateProcessor(storage_path('payslip.docx'));
        $phpWord->setValue('date', $payslip->Date_of_joining);
        $phpWord->setValue('Employee_name', $payslip->Employee_name);
        $phpWord->setValue('Pay_period', $payslip->Pay_period);
        $phpWord->setValue('Designation', $payslip->Designation);
        $phpWord->setValue('Employee_code', $payslip->Employee_code);
        $phpWord->setValue('Department', $payslip->Department);
        $phpWord->setValue('Basic_salary', $payslip->Basic_salary);
        $phpWord->setValue('Provident_fund', $payslip->Provident_fund);
        $phpWord->setValue('Incentive_pay', $payslip->Incentive_pay);
        $phpWord->setValue('Professional_tax', $payslip->Professional_tax);
        $phpWord->setValue('House_rent_amount', $payslip->House_rent_amount);
        $phpWord->setValue('Loan_amount', $payslip->Loan_amount);
        $phpWord->setValue('Meal_allowance', $payslip->Meal_allowance);
        $phpWord->setValue('Total', $payslip->Total_earnings);
        $phpWord->setValue('Deductions', $payslip->Total_deductions);
        $phpWord->setValue('Net', $payslip->Net_pay);
        $docPath = storage_path('files/payslip.docx');
        $phpWord->saveAs($docPath);
         return response()->download($docPath)->deleteFileAfterSend();
        //  -----//
         // Convert .docx to HTML
        

        // // Convert HTML to PDF using Dompdf
        // $pdf = new Dompdf();
        // $pdf->loadHtml($html);
        // $pdf->setPaper('A4', 'potrait');
        // $pdf->render();


        // //Output the generated PDF to Browser
        // return $pdf->stream('payslip.pdf');
    }


    // private function convertDocxToHtml($filePath)
    // {
        // Load .docx file
        // $phpWord = IOFactory::load($filePath);


        // Convert .docx to HTML
        // $htmlWriter = IOFactory::createWriter($phpWord, 'HTML');
        // $htmlPath = storage_path('app/temp.html');
        // $htmlWriter->save($htmlPath);


        // Get HTML content
        // return file_get_contents($htmlPath);
    // }



    
}
