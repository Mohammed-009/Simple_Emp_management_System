@extends('auth.Layout_logins.master')
    @section('content')
    <div class="container" style="margin-top: 30px; margin-bottom: 30px;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Register Employee</div>
                    <div class="card-body">
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                {{session('status')}}
                            </div>
                        @endif

                        <form method="POST"  action="{{ route('Actions.updatePost', $post->id) }}" class="main-frame" enctype="multipart/form-data">
                            @csrf
                            {{-- @method('PUT') --}}
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="firstname">firstname</label>
                                        <input type="text" name="firstname" value="{{$post->firstname}}" id="firstName" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="lastname">lastname</label>
                                        <input type="text" name="lastname" value="{{$post->lastname}}" id="lastName" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="text" name="phonenumber" value="{{$post->phonenumber}}" id="phone" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="emergence">Emergency Contact Number</label>
                                        <input type="text" name="emergencycontact" value="{{$post->emergencycontact}}" id="emergence" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" name='email' value="{{$post->email}}" id="email" class="form-control" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="department">Department</label>
                                        <input type="text" name="department" value="{{$post->department}}" id="department" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="employeeId">Employee Number</label>
                                        <input type="text" name="employeeId" value="{{$post->employeeId}}" id="Emp_no" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="positiontitle">Position Title</label>
                                        <input type="text" name="positiontitle" value="{{$post->positiontitle}}" id="positiontitle" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="employmenttype">Employment Type</label>
                                        <select name="employmenttype" id="EmpType" class="form-control">
                                            <option value="{{$post->employmenttype}}">{{$post->employmenttype}}</option>
                                            <option value="PART_TIME">PART TIME</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="birthdate">Birthdate</label>
                                <input type="date" name="birthdate" value="{{$post->birthdate}}" id="date" class="form-control" required>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="citizenship">Citizenship</label>
                                        <input type="text" name="citizenship" value="{{$post->citizenship}}" id="citizen" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="salary">Salary</label>
                                        <input type="number" name="salary" value="{{$post->salary}}" id="salary" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="stsrtdate">Start Date</label>
                                        <input type="date" name="startdate" value="{{$post->startdate}}" id="startdate" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select name="gender" id="gender" class="form-control" required>
                                            <option value="{{$post->gender}}">{{$post->gender}}</option>
                                            <option value="FEMALE">FEMALE</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="birthdate">Position Level</label>
                                <select name="Level" id="level" class="form-control form-select" required>
                                    <option value="{{$post->Level}}">worker</option>
                                    <option value="{{$post->Level}}">Staff</option>
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="profile">Upload Profile</label>
                                <input type="file" name="profile_pic" id="profile" class="form-control-file">
                            </div>
                            <br>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary w-50">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection