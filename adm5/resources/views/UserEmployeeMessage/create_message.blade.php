@extends('auth.Layout_logins.user_master')
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            messages
                            <span><a href="{{route('userdashboard')}}" class="btn btn-primary btn-sm float-end">BACK</a></span>
                        </div>
                        <div class="card-body">
                            <form action="{{route('MessageStore')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="Name">Name</label>
                                            <input type="text" name="Name" id="name" class="form-control" required>
                                        </div>
                                    </div>
                                
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="EmployeeNumber">Employee No</label>
                                            <input type="text" name="EmployeeNumber" id="EmployeeNumber" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="Phone">Phone</label>
                                            <input type="text" name="Phone" id="Phone" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="Email">Email</label>
                                            <input type="email" name="Email" id="email" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="MessageBody">Message</label>
                                    <textarea name="MessageBody" id="MessageBody" cols="10" rows="5" class="form-control"  required></textarea>
                                </div>
                                <br>
                                <div class="text-center">
                                    <input type="submit" value="send" class="btn btn-success w-25">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection