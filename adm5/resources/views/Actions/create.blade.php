@extends('auth.Layout_logins.master')
    @section('content')
    <div class="container" style="margin-top: 30px; margin-bottom: 30px;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Register Employee
                        <span><a href="{{route('Actions.employee_manage')}}" class="btn btn-primary btn-sm float-end">Back</a></span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('Actions.store')}}" class="main-frame" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="firstname">firstname</label>
                                        <input type="text" name="firstname" id="firstName" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="lastname">lastname</label>
                                        <input type="text" name="lastname" id="lastName" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="text" name="phonenumber" id="phone" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="emergence">Emergency Contact Number</label>
                                        <input type="text" name="emergencycontact" id="emergence" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" name='email' id="email" class="form-control" required>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="department">Department</label>
                                        <input type="text" name="department" id="department" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="employeeId">Employee Number</label>
                                        <input type="text" name="employeeId" id="Emp_no" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="positiontitle">Position Title</label>
                                        <input type="text" name="positiontitle" id="positiontitle" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="employmenttype">Employment Type</label>
                                        <select name="employmenttype" id="EmpType" class="form-control">
                                            <option value="">--select--</option>
                                            <option value="FULL_TIME">FULL TIME</option>
                                            <option value="PART_TIME">PART TIME</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="birthdate">Birthdate</label>
                                <input type="date" name="birthdate" id="date" class="form-control" required>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="citizenship">Citizenship</label>
                                        <input type="text" name="citizenship" id="citizen" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="salary">Salary</label>
                                        <input type="number" name="salary" id="salary" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="stsrtdate">Start Date</label>
                                        <input type="date" name="startdate" id="startdate" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select name="gender" id="gender" class="form-control form-select" required>
                                            <option value="MALE">MALE</option>
                                            <option value="FEMALE">FEMALE</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="birthdate">Position Level</label>
                                <select name="Level" id="level" class="form-control form-select" required>
                                    <option value="">--select--</option>
                                    <option value="0">worker</option>
                                    <option value="1">staff</option>
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="profile">Upload Profile</label>
                                <input type="file" name="profile_pic" id="profile" class="form-control-file">
                            </div>
                            <br>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary w-50">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection