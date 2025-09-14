@extends('auth.Layout_logins.master')
    @section('content')
        <div class="container-fluid px-4">
            <div class="col-sm-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        make payment
                    </div>
                    <div class="card-body">
                        @if(count($posts)>0)
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>PROFILE</th>
                                        <th>FIRSTNAME</th>
                                        <th>LASTNAME</th>
                                        <th>POSITION</th>
                                        <th>LEVEL</th>
                                        <th>SALARY</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><img src="/storage/uploaded_images/{{$post->profile_pic}}" alt="" style="width: 50px; height: 60px; border-radius: 50px;"></td>
                                    <td>{{$post->firstname}}</td>
                                    <td>{{$post->lastname}}</td>
                                    <td>{{$post->positiontitle}}</td>
                                    <td>
                                        @if($post->Level==1)
                                            <span class="text-info">Staff</span>
                                        @else
                                            <span class="text-info">Worker</span>
                                        @endif
                                    </td>
                                    <td>{{$post->salary}}</td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#myModal-{{ $post->id }}">Pay</button>
    
                                        <div class="modal" id="myModal-{{ $post->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="ststicBackdropLabel">Salary payment</h1>
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
                                                            <div class="text-center">
                                                                <form action="#">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label for="amount" class="font-weight-bold" style="color: blue">Amount to pay</label>
                                                                        <input type="number" name="pay" id="pay" class="form-control" required value="{{$post->salary}}">
                                                                    </div>
                                                                    <br>
                                                                    <div>
                                                                        <input type="submit" value="pay" class="btn btn-success w-25">
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
                                        <a href="{{route('Actions.edit', $post->id)}}" class="btn btn-primary btn-sm">Change</a>
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