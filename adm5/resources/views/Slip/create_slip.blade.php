@extends('auth.Layout_logins.master')
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Payslip
                          <span><a href="{{route('fetch')}}" class="btn btn-primary btn-sm float-end">Back</a></span>
                        </div>
                        <div class="card-body">
                            <form action="{{route('Slip.store')}}" method="POST">
                                @csrf

                                <div class="row">
                                  <div class="col-12">
                                    <div class="form-group">
                                      <label for="user_id">Select Employee</label>

                                      <select name="user_id" id="user_id" class="form-control form-control-lg" required>
                                        <option value="">Choose Employee</option>

                                        @foreach($employees as $employee)
                                        <option value="{{ $employee->id }}">
                                          {{ $employee->name }}
                                        </option>
                                        @endforeach

                                      </select>
                                    </div>
                                  </div>
                                </div>

                                <br>

                                
                                <div class="row">
                                    <div class="col-12 col-lg-4">
                                        <div class="form-group">
                                            <label for="Employee">Employee Name</label>
                                            <input type="text" id="employee" name="Employee_name" class="form-control form-control-lg" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                      <div class="form-group">
                                        <label for="Employee_number">Employee Number</label>
                                        <input type="text" id="Employee_code" name="Employee_code" class="form-control form-control-lg" required>
                                      </div>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                      <div class="form-group">
                                        <label for="Account_no">Account No</label>
                                        <input type="text" id="account" name="Account_number" class="form-control form-control-lg" required>
                                      </div>
                                    </div>
                                </div>
                                  <br>
                                <div class="row">
                                  <div class="col-12 col-lg-4">
                                    <div class="form-group">
                                      <label for="branch">Working Branch</label>
                                      <input type="text" id="branch" name="Working_branch" class="form-control form-control-lg" required>
                                    </div>
                                  </div>
                                  <div class="col-12 col-lg-4">
                                    <div class="form-group">
                                      <label for="department">Department</label>
                                      <input type="text" id="department" name="Department" class="form-control form-control-lg" required>
                                    </div>
                                  </div>
                                  <div class="col-12 col-lg-4">
                                    <div class="form-group">
                                      <label for="date">Date of joining</label>
                                      <input type="date" id="date" name="Date_of_joining" class="form-control form-control-lg" required>
                                    </div>
                                  </div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                      <label for="designation">Designation</label>
                                      <input type="text" id="designation" name="Designation" class="form-control form-control-lg" required>
                                    </div>
                                  </div>
                                  <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                      <label for="Pay_period">Pay Period</label>
                                      <input type="text" id="pay" name="Pay_period" class="form-control form-control-lg" required>
                                    </div>
                                  </div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="col-12 col-lg-4">
                                    <div class="form-group">
                                      <label for="Basic_salary">Basic Salary</label>
                                      <input type="number" id="basic" name="Basic_salary" class="form-control form-control-lg" required>
                                    </div>
                                  </div>
                                  <div class="col-12 col-lg-4">
                                    <div class="form-group">
                                      <label for="Incentive_pay">Incentive Pay</label>
                                      <input type="number" id="incentive" name="Incentive_pay" class="form-control form-control-lg" required>
                                    </div>
                                  </div>
                                  <div class="col-12 col-lg-4">
                                    <div class="form-group">
                                      <label for="House_allowance">House Allowance</label>
                                      <input type="number" id="house" name="House_rent_amount" class="form-control form-control-lg" required>
                                    </div>
                                  </div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="col-12 col-lg-3">
                                    <div class="form-group">
                                      <label for="Meal_allowance">Meal Allowance</label>
                                      <input type="number" id="meal" name="Meal_allowance" class="form-control form-control-lg" required>
                                    </div>
                                  </div>
                                  <div class="col-12 col-lg-3">
                                    <div class="form-group">
                                      <label for="Provident_fund">Provident Fund</label>
                                      <input type="number" id="provident" name="Provident_fund" class="form-control form-control-lg" required>
                                    </div>
                                  </div>
                                  <div class="col-12 col-lg-3">
                                    <div class="form-group">
                                      <label for="Professional_tax">Professional Tax</label>
                                      <input type="number" id="professional" name="Professional_tax" class="form-control form-control-lg" required>
                                    </div>
                                  </div>
                                  <div class="col-12 col-lg-3">
                                    <div class="form-group">
                                      <label for="Loan">Loan</label>
                                      <input type="number" id="loan" name="Loan_amount" class="form-control form-control-lg" required>
                                    </div>
                                  </div>
                                </div>
                              
                                <br>
                                <div class="text-center">
                                  <div class="row">
                                    <div class="col-12 col-lg-6">
                                      <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                      <button type="reset" class="btn btn-secondary">Reset</button>
                                    </div>
                                  </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
