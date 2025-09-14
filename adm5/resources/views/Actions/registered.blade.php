@extends('auth.Layout_logins.master')
    @section('content')
        <div class="container-fluid px-4">
            <div class="col-sm-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Employees
                            <span><a href="{{route('Actions.create')}}" class="btn btn-primary float-end">Add Employee</a></span>
                    </div>
                    <div class="card-body">
                        @if(count($posts) > 0)
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>PROFILE</th>
                                    <th>FIRSTNAME</th>
                                    <th>LASTNAME</th>
                                    <th>GENDER</th>
                                    <th>PHONE</th>
                                    <th>E_CONTACT</th>
                                    <th>EMAIL</th>
                                    <th>DEPARTMENT</th>
                                    <th>EMP_NO</th>
                                    <th>POSITION</th>
                                    <th>LEVEL</th>
                                    <th>EMP_TYPE</th>
                                    <th>BIRTHDATE</th>
                                    <th>CITIZENSHIP</th>
                                    <th>SALARY</th>
                                    <th>START_DATE</th>
                                </tr>
                                </thead>
                            @foreach($posts as $post)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td><img src="/storage/uploaded_images/{{$post->profile_pic}}" alt="" style="width: 50px; height: 60px; border-radius: 50px;"></td>
                                        <td>{{$post->firstname}}</td>
                                        <td>{{$post->lastname}}</td>
                                        <td>{{$post->gender}}</td>
                                        <td>{{$post->phonenumber}}</td>
                                        <td>{{$post->emergencycontact}}</td>
                                        <td>{{$post->email}}</td>
                                        <td>{{$post->department}}</td>
                                        <td>{{$post->employeeId}}</td>
                                        <td>{{$post->positiontitle}}</td>
                                        <td>
                                            @if($post->Level==1)
                                                <span class="text-info">Staff</span>
                                            @else
                                                <span class="text-info">Worker</span>
                                            @endif
                                        </td>
                                        <td>{{$post->employmenttype}}</td>
                                        <td>{{$post->birthdate}}</td>
                                        <td>{{$post->citizenship}}</td>
                                        <td>{{$post->salary}}</td>
                                        <td>{{$post->startdate}}</td>
                                        
                                    </tr>
                            @endforeach
                        </table>
                        @else
                            <p>No employees registered</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endsection