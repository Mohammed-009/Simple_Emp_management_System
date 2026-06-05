@extends('auth.Layout_logins.master')
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Payslip</div>
                        <div class="card-body">
                            <form action="{{route('update-payslip', $payslip->id)}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-lg-4">
                                        <div class="form-group">
                                            <label for="Employee">Employee Name</label>
                                            <input type="text" id="employee" name="Employee_name" value="{{$payslip->Employee_name}}" class="form-control form-control-lg" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                      <div class="form-group">
                                        <label for="Employee_number">Employee Number</label>
                                        <input type="text" id="Employee_code" name="Employee_code" value="{{$payslip->Employee_code}}" class="form-control form-control-lg" required>
                                      </div>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                      <div class="form-group">
                                        <label for="Account_no">Account no</label>
                                        <input type="text" id="account" name="Account_number" value="{{$payslip->Account_number}}" class="form-control form-control-lg" required>
                                      </div>
                                    </div>
                                </div>
                                  <br>
                                <div class="row">
                                  <div class="col-12 col-lg-4">
                                    <div class="form-group">
                                      <label for="branch">Working Branch</label>
                                      <input type="text" id="branch" name="Working_branch" value="{{$payslip->Working_branch}}" class="form-control form-control-lg" required>
                                    </div>
                                  </div>
                                  <div class="col-12 col-lg-4">
                                    <div class="form-group">
                                      <label for="department">Department</label>
                                      <input type="text" id="department" name="Department" value="{{$payslip->Department}}" class="form-control form-control-lg" required>
                                    </div>
                                  </div>
                                  <div class="col-12 col-lg-4">
                                    <div class="form-group">
                                      <label for="date">Date of joining</label>
                                      <input type="date" id="date" name="Date_of_joining" value="{{$payslip->Date_of_joining}}" class="form-control form-control-lg" required>
                                    </div>
                                  </div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                      <label for="designation">Designation</label>
                                      <input type="text" id="designation" name="Designation" value="{{$payslip->Designation}}" class="form-control form-control-lg" required>
                                    </div>
                                  </div>
                                  <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                      <label for="Pay_period">Pay Period</label>
                                      <input type="text" id="pay" name="Pay_period" value="{{$payslip->Pay_period}}" class="form-control form-control-lg" required>
                                    </div>
                                  </div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="col-12 col-lg-4">
                                    <div class="form-group">
                                      <label for="Basic_salary">Basic Salary</label>
                                      <input type="number" id="basic" name="Basic_salary" value="{{$payslip->Basic_salary}}" class="form-control form-control-lg" required>
                                    </div>
                                  </div>
                                  <div class="col-12 col-lg-4">
                                    <div class="form-group">
                                      <label for="Incentive_pay">Incentive Pay</label>
                                      <input type="number" id="incentive" name="Incentive_pay" value="{{$payslip->Incentive_pay}}" class="form-control form-control-lg" required>
                                    </div>
                                  </div>
                                  <div class="col-12 col-lg-4">
                                    <div class="form-group">
                                      <label for="House_allowance">House Allowance</label>
                                      <input type="number" id="house" name="House_rent_amount" value="{{$payslip->House_rent_amount}}" class="form-control form-control-lg" required>
                                    </div>
                                  </div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="col-12 col-lg-3">
                                    <div class="form-group">
                                      <label for="Meal_allowance">Meal Allowance</label>
                                      <input type="number" id="meal" name="Meal_allowance" value="{{$payslip->Meal_allowance}}" class="form-control form-control-lg" required>
                                    </div>
                                  </div>
                                  <div class="col-12 col-lg-3">
                                    <div class="form-group">
                                      <label for="Provident_fund">Provident Fund</label>
                                      <input type="number" id="provident" name="Provident_fund" value="{{$payslip->Provident_fund}}" class="form-control form-control-lg" required>
                                    </div>
                                  </div>
                                  <div class="col-12 col-lg-3">
                                    <div class="form-group">
                                      <label for="Professional_tax">Professional Tax</label>
                                      <input type="number" id="professional" name="Professional_tax" value="{{$payslip->Professional_tax}}" class="form-control form-control-lg" required>
                                    </div>
                                  </div>
                                  <div class="col-12 col-lg-3">
                                    <div class="form-group">
                                      <label for="Loan">Loan</label>
                                      <input type="number" id="loan" name="Loan_amount" value="{{$payslip->Loan_amount}}" class="form-control form-control-lg" required>
                                    </div>
                                  </div>
                                </div>
                                <br>
                                {{-- <div class="row">
                                  <div class="col">
                                    <div class="form-group">
                                      <label for="Earnings">Total Earnings</label>
                                      <input type="number" id="total" name="Total_earnings" value="{{$payslip->Total_earnings}}" class="form-control form-control-lg" required>
                                    </div>
                                  </div>
                                  <div class="col">
                                    <div class="form-group">
                                      <label for="Employee_code">Total Deductions</label>
                                      <input type="number" id="deductions" name="Total_deductions" value="{{$payslip->Total_deductions}}" class="form-control form-control-lg" required>
                                    </div>
                                  </div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="col">
                                    <div class="form-group">
                                      <label for="Employee_code">Net Pay</label>
                                      <input type="number" id="net" name="Net_pay" value="{{$payslip->Net_pay}}" class="form-control form-control-lg" required>
                                    </div>
                                  </div>
                                </div> --}}
                                <br>
                                <div class="text-center">
                                  <button type="submit" class="btn btn-primary w-50 mb-4">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    {{--  --}}
    {{-- <form class="row g-3">
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Email</label>
          <input type="email" class="form-control" id="inputEmail4">
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Password</label>
          <input type="password" class="form-control" id="inputPassword4">
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">Address</label>
          <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
        </div>
        <div class="col-12">
          <label for="inputAddress2" class="form-label">Address 2</label>
          <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label">City</label>
          <input type="text" class="form-control" id="inputCity">
        </div>
        <div class="col-md-4">
          <label for="inputState" class="form-label">State</label>
          <select id="inputState" class="form-select">
            <option selected>Choose...</option>
            <option>...</option>
          </select>
        </div>
        <div class="col-md-2">
          <label for="inputZip" class="form-label">Zip</label>
          <input type="text" class="form-control" id="inputZip">
        </div>
        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              Check me out
            </label>
          </div>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
      </form> --}}
    {{--  --}}
