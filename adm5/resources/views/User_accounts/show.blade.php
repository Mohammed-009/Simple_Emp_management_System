@extends('auth.Layout_logins.master')
    @section('content')
        <div class="container-fluid px-4">
            {{-- <h1 class="mt-4">Accounts</h1> --}}
            <div class="col-sm-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        user accounts
                        {{-- <span><a href="{{route('slip.create')}}" class="btn btn-primary float-end">Create payslip</a></span> --}}
                    </div>
                    <div class="card-body">
                        @if(count($profiles) >0)
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>FIRSTNAME</th>
                                        <th>LASTNAME</th>
                                        <th>USERNAME</th>
                                        <th>TELEPHONE</th>
                                        <th>EMAIL</th>
                                        <th>STATUS 1</th>
                                        <th>STATUS 2</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                @foreach($profiles as $profile)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$profile->Firstname}}</td>
                                        <td>{{$profile->Lastname}}</td>
                                        <td>{{$profile->Employee_number}}</td>
                                        <td>{{$profile->Telephone}}</td>
                                        <td>{{$profile->Email}}</td>
                                        <td>
                                            @if($profile->is_Admin==0)
                                                <span class="text-info">User</span>
                                            @else
                                                <span class="text-info">Admin</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($profile->deleted_at==NULL)
                                                <span class="text-primary">Active</span>
                                            @else
                                                <span class="text-primary">Removed</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('edit_details', $profile->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="{{route('deleteUserDetails', $profile->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <p>No user account</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endsection