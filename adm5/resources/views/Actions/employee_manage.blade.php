@extends('auth.Layout_logins.master')
    @section('content')
    {{-- <div class="container">
        <div class="row-justify-content-center">
            <form action="#">
                @csrf
                <div class="form-group">
                        <div class="main-div">
                            <input type="text" class="form-control w-25" placeholder="search">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                </div>
            </form>

            <div class="col-md-13">
                <div class="card">
                    <div class="card-header">registered
                        <span><a href="{{route('Actions.create')}}" class="btn btn-primary float-right">Add Employee</a></span>
                    </div>
                    <div class="card-body">
                        @if($posts->count() > 0)
                        <div class="table-responsive">
                        <table class="table table-striped table-bordered input-lg">
                            <tr>
                                <th>#</th>
                                <th>PROFILE</th>
                                <th>FIRSTNAME</th>
                                <th>LASTNAME</th>
                                <th>PHONE NUMBER</th>
                                <th>EMPLOYEE ID</th>
                                <th>DEPARTMENT</th>
                                <th>POSITION TITLE</th>
                                <th>ACTION</th>
                                
                            </tr>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td><img src="/storage/uploaded_images/{{$post->profile_pic}}" alt="" style="width: 50px; height: 60px; border-radius: 50px;"></td>
                                <td>{{$post->firstname}}</td>
                                <td>{{$post->lastname}}</td>
                                <td>{{$post->phonenumber}}</td>
                                <td>{{$post->employeeId}}</td>
                                <td>{{$post->department}}</td>
                                <td>{{$post->positiontitle}}</td>
                                <td>
                                    <a href="#" class="btn btn-info"><i class="far fa-eye"></i></a>
                                    <a href="#" class="btn btn-primary"><i class="far fa-edit"></i></a>
                                    <a href="#" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                                </td>

                                
                            </tr>
                        @endforeach
                    </table>
                </div>
                    @else
                        <p>No posts found</p>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container-fluid px-4">
        <h1 class="mt-4">Employees</h1>
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
                                <th scope="col">#</th>
                                <th>PROFILE</th>
                                <th>FIRSTNAME</th>
                                <th>LASTNAME</th>
                                <th>EMP_ID</th>
                                <th>POSITION</th>
                                <th>LEVEL</th>
                                <th>ACTIONS</th>
                            </tr>
                            </thead>
                        @foreach($posts as $post)
                        <tr>
                            <td scope="row">{{$loop->iteration}}</td>
                            <td><img src="/storage/uploaded_images/{{$post->profile_pic}}" alt="" style="width: 50px; height: 60px; border-radius: 50px;"></td>
                            <td>{{$post->firstname}}</td>
                            <td>{{$post->lastname}}</td>
                            <td>{{$post->employeeId}}</td>
                            <td>{{$post->positiontitle}}</td>
                            <td>
                                @if($post->Level==1)
                                    <span class="text-info">Staff</span>
                                @else
                                    <span class="text-info">Worker</span>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#myModal-{{ $post->id }}"><i class="far fa-eye"></i></button>
    
                                <div class="modal" id="myModal-{{ $post->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="ststicBackdropLabel">Employee details</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div><small>Firstname: <span>{{$post->firstname}}</span></small></div>
                                                        </div>
                                                        <div class="col">
                                                            <div><small>Lastname: <span>{{$post->lastname}}</span></small></div>
                                                        </div>
                                                    </div>
                    
                                                    <div class="row">
                                                        <div class="col">
                                                            <div><small>Phone: <span>{{$post->phonenumber}}</span></small></div>
                                                        </div>
                                                        <div class="col">
                                                            <div><small>Employee ID: <span>{{$post->employeeId}}</span></small></div>
                                                        </div>
                                                    </div>
                    
                                                    <div class="row">
                                                        <div class="col">
                                                            <div><small>Email: <span>{{$post->email}}</span></small></div>
                                                        </div>
                                                        <div class="col">
                                                            <div><small>Position: <span>{{$post->positiontitle}}</span></small></div>
                                                        </div>
                                                </div> 
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                                <a href="{{route('Actions.edit', $post->id)}}" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
                                <a href="{{route('Actions.deletePost', $post->id)}}" class="btn btn-danger btn-sm" onclick=" return confirm('Are you sure you want to delete this record? ')"><i class="far fa-trash-alt"></i></a>
                                
    
                                    {{-- @csrf --}}
                                    {{-- <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button> --}}
                                {{-- </form> --}}
                                {{-- <a href="{{route('Actions.destroy', $post->id)}}" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a> --}}
                            </td> 
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