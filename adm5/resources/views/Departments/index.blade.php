@extends('auth.Layout_logins.master')
    @section('content')
        <div class="container-fluid px-4">
            <h1 class="mt-4">Departments</h1>
            <div class="c0l-sm-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        departments
                        <span><a href="{{route('createDepartment')}}" class="btn btn-primary float-end">add department</a></span>
                    </div>
                    <div class="card-body">
                        @if(count($departments) >0)
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>DEPARTMENT NAME</th>
                                        <th>DEPARTMENT DESCRIPTION</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                @foreach($departments as $department)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$department->Department_name}}</td>
                                        <td>{{$department->Department_description}}</td>
                                        <td>
                                            <a href="{{route('editDepartments', $department->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="{{route('deleteDepartments', $department->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this record');">Delete</a>
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