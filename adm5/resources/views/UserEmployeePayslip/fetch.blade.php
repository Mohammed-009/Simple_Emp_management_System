@extends('auth.Layout_logins.user_master')
    @section('content')
        <div class="container-fluid px-4">
            <div class="col-sm-12">
                <div>
                    <h4>Dear <span class="text-warning fs-5">{{auth()->user()->name}}</span> you can download your pay-slip by clicking the Generate payslip button</h4>
                </div>
                <div class="card">
                    <div class="card-header"> 
                        pay-slip
                        <span><a href="{{route('userdashboard')}}" class="btn btn-primary btn-sm float-end">BACK</a></span>
                    </div>
                    <div class="card-body">
                        @if(count($payslips) >0)
                            {{-- <table id="datatablesSimple"> --}}
                            <table class="table table-responsive table-bordered">
                                <thead>
                                    <tr>
                                        {{-- <th>#</th> --}}
                                        <th>EMP_NAME</th>
                                        <th>EMP_NUMBER</th>
                                        <th>DESIGNATION</th>
                                        <th>DEPARTMENT</th>
                                        <th>PAYSLIP</th>
                                    </tr>
                                </thead>
                            @foreach($payslips as $payslip)
                                <tr>
                                    {{-- <td>{{$loop->iteration}}</td> --}}
                                    <td>{{$payslip->Employee_name}}</td>
                                    <td>{{$payslip->Employee_number}}</td>
                                    <td>{{$payslip->Designation}}</td>
                                    <td>{{$payslip->Department}}</td>
                                    {{-- <td>
                                        <a href="{{route('Slip.download.pdf', $payslip->id)}}" class="btn btn-info btn-sm"><i class="fa fa-download" aria-hidden="true"></i></a>
                                    </td> --}}
                                    <td>
                                        {{-- Modal --}}
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#myModal-{{ $payslip->id }} ">Generate payslip</button>
                                        
                                        <div class="modal" id="myModal-{{ $payslip->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="ststicBackdropLabel">payslip</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{-- start heading --}}
                                                        <div class="text-center">
                                                            <h4>Payslip</h4>
                                                            <h6>Mabati Ltd</h6>
                                                            <h6>Mombasa-nairobi highway</h6>
                                                            <h6>Mariakani Town</h6>
                                                            <hr>
                                                        <div class="row">
                                                            <div class="col">
                                                                <small>Date of joining: <span>{{$payslip->Date_of_joining}}</span></small>
                                                            </div>
                                                            <div class="col">
                                                                <small>Employee name: <span>{{$payslip->Employee_name}}</span></small>
                                                            </div>
                                                        </div>
    
                                                        <div class="row">
                                                            <div class="col">
                                                                <small>Pay period: <span>{{$payslip->Pay_period}}</span></small>
                                                            </div>
                                                            <div class="col">
                                                                <small>Designation: <span>{{$payslip->Designation}}</span></small>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <small>Employee code: <span>{{$payslip->Employee_code}}</span></small>
                                                            </div>
                                                            <div class="col">
                                                                <small>Department: <span>{{$payslip->Department}}</span></small>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <small>Working branch: <span>{{$payslip->Working_branch}}</span></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- end heading --}}
                                                        <hr>
                                                        {{-- Table --}}
                                                        <div class="container">
                                                                <div class="responsive">
                                                                    <table class="table table-striped table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Earnings</th>
                                                                                <th>Amount</th>
                                                                                <th>Deductions</th>
                                                                                <th>Amount</th>
                                                                            </tr>
                                                                        </thead>
                                                                            <tr>
                                                                                <td>Basic</td>
                                                                                <td>{{$payslip->Basic_salary}}</td>
                                                                                <td>Provident fund</td>
                                                                                <td>{{$payslip->Provident_fund}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Incentive pay</td>
                                                                                <td>{{$payslip->Incentive_pay}}</td>
                                                                                <td>Professional tax</td>
                                                                                <td>{{$payslip->Professional_tax}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>House rent allowance</td>
                                                                                <td>{{$payslip->House_rent_amount}}</td>
                                                                                <td>Loan</td>
                                                                                <td>{{$payslip->Loan_amount}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Meal allowance</td>
                                                                                <td>{{$payslip->Meal_allowance}}</td>
                                                                                <td></td>
                                                                                <td></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Total earnings</td>
                                                                                <td>{{$payslip->Basic_salary + $payslip->Incentive_pay + $payslip->House_rent_amount + $payslip->Meal_allowance}}</td>
                                                                                <td>Total deductions</td>
                                                                                <td>{{$payslip->Provident_fund + $payslip->Professional_tax + $payslip->Loan_amount}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td>Net pay</td>
                                                                                <td>{{$payslip->Basic_salary + $payslip->Incentive_pay + $payslip->House_rent_amount + $payslip->Meal_allowance - $payslip->Provident_fund - $payslip->Professional_tax - $payslip->Loan_amount}}</td>
                                                                            </tr>
                                                                    </table>
                                                                    <div class="text-center">
                                                                        <h6>Net pay: <small>{{$payslip->Basic_salary + $payslip->Incentive_pay + $payslip->House_rent_amount + $payslip->Meal_allowance - $payslip->Provident_fund - $payslip->Professional_tax - $payslip->Loan_amount}}</small></h6>
                                                                        <br>
                                                                        <p>Payslip generated by mabati ltd</p>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{route('Slip.download.pdf', $payslip->id)}}" class="btn btn-info btn-sm"><i class="fa fa-download" aria-hidden="true"></i></a>
                                                        @if(Auth::user()->is_Admin==1)
                                                        <a href="{{route('edit-payslip', $payslip->id)}}" class="btn btn-primary btn-sm float-left">Edit</a>
                                                        <a href="{{route('delete-payslip', $payslip->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this record?')">Delete</a>
                                                        @endif
                                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end modal --}}
                                    </td>
                                </tr>
                            @endforeach
                            </table>
                            @else
                                <p>Your payslip has not yet been created</p>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    @endsection