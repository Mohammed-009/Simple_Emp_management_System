@extends('auth.Layout_logins.user_master')
    @section('content')
        <div class="container-fluid px-4">
            <div class="col-sm-12">
                <div class="card mb-4">
                    <div class="card-header">
                        My requests
                        <span><a href="{{route('userdashboard')}}" class="btn btn-primary btn-sm float-end">BACK</a></span>
                    </div>
                    <div class="card-body">
                        @if(count($messages)> 0)
                        <table class="table table-responsive table-bordered table-stripped" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NAME</th>
                                    <th>REQUEST TYPE</th>
                                    <th>CREATED AT</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                            @foreach($messages as $message)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$message->Name}}</td>
                                    <td>{{$message->MessageBody}}</td>
                                    <td>{{$message->created_at}}</td>
                                    <td><span class="text-primary"><i class="fa fa-spinner"></i>  pending</span></td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You have no any request message sent</p>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    @endsection