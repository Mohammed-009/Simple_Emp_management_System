@extends('auth.Layout_logins.master')
    @section('content')
        <div class="container-fluid px-4">
            <div class="col-sm-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        complaints
                    </div>
                    <div class="card-body">
                        @if (count($messages)>0)
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NAME</th>
                                    <th>EMP NO</th>
                                    <th>PHONE</th>
                                    <th>EMAIL</th>
                                    <th>MESSAGE</th>
                                    <th>ACTION</th>
                                </tr>
                                </thead>
                                @foreach ($messages as $message)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$message->Name}}</td>
                                        <td>{{$message->EmployeeNumber}}</td>
                                        <td>{{$message->Phone}}</td>
                                        <td>{{$message->Email}}</td>
                                        <td>{{$message->MessageBody}}</td>
                                        <td>
                                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#myModal-{{ $message->id }}">Reply</button>
    
                                            <div class="modal" id="myModal-{{ $message->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="ststicBackdropLabel">message</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                                {{-- <div class="container mt-2"> --}}
                                                                    <form method="post" action="{{ route('storeMail') }}" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label>Employee Email:</label>
                                                                            <input type="email" name="email" class="form-control" required value="{{$message->Email}}">
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
                                                                            <button type="submit" class="btn btn-success btn-block">Send Email</button>
                                                                        </div>
                                                                    </form>
                                                                {{-- </div> --}}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            <a href="{{route('DeleteMessage', $message->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                            {{-- <a href="{{route('mailView')}}" class="btn btn-success">Reply</a> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            
                        </table>
                        @else
                            <p>No messages found</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endsection