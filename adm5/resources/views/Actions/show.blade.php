@extends('auth.Layout_logins.master')
    @section('content')
        <div class="container">
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="ststicBackdropLabel">Employee details</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            
                            {{-- <div class="jumbotron">
                                <div class="row">
                                    <div class="col">
                                        <div><h3>Firstname: <span>{{$post->firstname}}</span></h3></div>
                                    </div>
                                    <div class="col">
                                        <div><h3>Lastname: <span>{{$post->lastname}}</span></h3></div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div><h3>Phone: <span>{{$post->phonenumber}}</span></h3></div>
                                    </div>
                                    <div class="col">
                                        <div><h3>Employee ID: <span>{{$post->lastname}}</span></h3></div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div><h3>Email: <span>{{$post->email}}</span></h3></div>
                                    </div>
                                    <div class="col">
                                        <div><h3>Position: <span>{{$post->positiontitle}}</span></h3></div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    @endsection