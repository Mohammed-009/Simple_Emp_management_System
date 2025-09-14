@extends('auth.Layout_logins.master')
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">profile information
                            <span><a href="{{route('dashboard')}}" class="btn btn-secondary float-end">Back</a></span>
                        </div>
                        <div class="card-body">
                            <form action="{{route('updateUserDetails', $profile->id)}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-lg-4">
                                        <div class="form-group">
                                            <label for="Firstname">Firstname</label>
                                            <input type="text" id="firstname" value="{{$profile->Firstname}}" class="form-control" name="Firstname" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <div class="form-group">
                                            <label for="Lastname">Lastname</label>
                                            <input type="text" id="lastname" value="{{$profile->Lastname}}" class="form-control" name="Lastname" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <div class="form-group">
                                            <label for="National">National ID</label>
                                            <input type="text" id="national" value="{{$profile->National_ID}}" class="form-control" name="National_ID" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-12 col-lg-4">
                                        <label for="date">D.O.B</label>
                                        <input type="date" id="date" value="{{$profile->Date_of_birth}}" class="form-control" name="Date_of_birth" required>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <label for="Gender">Gender</label>
                                        <select name="Gender" id="gender" value="{{$profile->Gender}}" class="form-control">
                                            <option value="MALE">MALE</option>
                                            <option value="FEMALE">FEMALE</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <label for="Marital status">Marital status</label>
                                        <input type="text" id="status" value="{{$profile->Marital_status}}" class="form-control" name="Marital_status" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-12 col-lg-4">
                                        <label for="Nationality">Nationality</label>
                                        <input type="text" id="nationality" value="{{$profile->Nationality}}" class="form-control" name="Nationality" required>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <label for="Religion">Religion</label>
                                        <input type="text" id="religion" value="{{$profile->Religion}}" class="form-control" name="Religion" required>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <label for="Disability">Disability</label>
                                        <input type="text" id="disability" value="{{$profile->Disability}}" class="form-control" name="Disability" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-12 col-lg-4">
                                        <label for="Telephone">Telephone</label>
                                        <input type="text" id="telephone" value="{{$profile->Telephone}}" class="form-control" name="Telephone" required>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <label for="Email">Email</label>
                                        <input type="email" id="email" value="{{$profile->Email}}" class="form-control" name="Email" required>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <label for="Home">Home addres</label>
                                        <input type="text" id="address" value="{{$profile->Home_address}}" class="form-control" name="Home_address" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-12 col-lg-4">
                                        <label for="county">County</label>
                                        <input type="text" id="county" value="{{$profile->County}}" class="form-control" name="County" required>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <label for="Subcounty">Subcounty</label>
                                        <input type="text" id="subcounty" value="{{$profile->Subcounty}}" class="form-control" name="Subcounty" required>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <label for="Constituency">Constituency</label>
                                        <input type="text" id="constituency" value="{{$profile->Constituency}}" class="form-control" name="Constituency" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="Programme">Programme</label>
                                        <input type="text" id="program" value="{{$profile->Programme}}" name="Programme" class="form-control" required>
                                    </div>
                                </div>
                                <br>
                                <div class="text-center">
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <button type="reset" class="btn btn-secondary">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection