@extends('auth.Layout_logins.master')
    @section('content')
        <div class="container-fluid px-4">
            <div class="col-sm-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Leave
                    </div>
                    <div class="card-body">
                        @if(count($posts)>0)
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>FIRSTNAME</th>
                                        <th>LASTNAME</th>
                                        <th>POSITION</th>
                                        <th>EMAIL</th>
                                        <th>LEVEL</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$post->firstname}}</td>
                                    <td>{{$post->lastname}}</td>
                                    <td>{{$post->positiontitle}}</td>
                                    <td>{{$post->email}}</td>
                                    <td>
                                        @if($post->Level==1)
                                            <span class="text-info">Staff</span>
                                        @else
                                            <span class="text-info">Worker</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#myModal-{{ $post->id }}">Give leave</button>
    
                                        <div class="modal" id="myModal-{{ $post->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="ststicBackdropLabel">Leave</h1>
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
                                                            <br><br>
                                                            <div class="container mt-2" style="max-width: 750px">
      
                                                                <h4>Email employee for leave</h4>
                                                                <br>
                                                                <form method="post" action="{{ route('storeMail') }}" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label>Employee Email:</label>
                                                                        <input type="email" name="email" class="form-control" required value="{{$post->email}}">
                                                                    </div>
                                                                    <br>
                                                                    <div class="form-group">
                                                                        <label>Subject:</label>
                                                                        <input type="text" name="subject" class="form-control">
                                                                    </div>
                                                                    <br>
                                                                    <div class="form-group">
                                                                        <label>Body:</label>
                                                                        <textarea class="form-control" name="body"></textarea>
                                                                    </div>
                                                                    
                                                                    <div class="form-group mt-3 mb-3 text-center">
                                                                        <button type="submit" class="btn btn-success btn-block" onclick="return confirm('Are you sure to notify employee for a leave?');">Send Email</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        {{-- <a href="{{route('Create-amount')}}" class="btn btn-success btn-sm">Pay</a> --}}
                                        {{-- <a href="{{route('leaveEmail')}}" class="btn btn-primary btn-sm">Give leave</a> --}}
                                    </td>
                                </tr>
                            @endforeach
                            </table>
                        @else
                            <p>No record fetched</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endsection