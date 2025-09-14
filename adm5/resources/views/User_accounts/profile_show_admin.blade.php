 @extends('auth.Layout_logins.master')
    @section('content')
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">profile information</div>
                <div class="card-body">
                  @if(count($profiles) >0)
                        <table class="table table-responsive table-bordered">
                            @foreach($profiles as $profile)
                            <tr>
                              <td>FIRSTNAME:</td>
                              <td>{{$profile->Firstname}}</td>
                            </tr>
                            <tr>
                              <td>LASTNAME:</td>
                              <td>{{$profile->Lastname}}</td>
                            </tr>
                            <tr>
                              <td>EMAIL:</td>
                              <td>{{$profile->Email}}</td>
                            </tr>
                            <tr>
                              <td>TELEPHONE:</td>
                              <td>{{$profile->Telephone}}</td>
                            </tr>
                            <tr>
                              <td>NATIONAL ID:</td>
                              <td>{{$profile->National_ID}}</td>
                            </tr>
                            <tr>
                              <td>DATE OF BIRTH:</td>
                              <td>{{$profile->Date_of_birth}}</td>
                            </tr>
                            <tr>
                              <td>GENDER:</td>
                              <td>{{$profile->Gender}}</td>
                            </tr>
                            <tr>
                              <td>MARITAL STATUS:</td>
                              <td>{{$profile->Marital_status}}</td>
                            </tr>
                            <tr>
                              <td>DISABILITY:</td>
                              <td>{{$profile->Disability}}</td>
                            </tr>
                            <tr>
                              <td>NATIONALITY:</td>
                              <td>{{$profile->Nationality}}</td>
                            </tr>
                            <tr>
                              <td>RELIGION:</td>
                              <td>{{$profile->Religion}}</td>
                            </tr>
                            <tr>
                              <td>HOME ADDRESS:</td>
                              <td>{{$profile->Home_address}}</td>
                            </tr>
                            <tr>
                              <td>COUNTY:</td>
                              <td>{{$profile->County}}</td>
                            </tr>
                            <tr>
                              <td>SUB COUNTY:</td>
                              <td>{{$profile->Subcounty}}</td>
                            </tr>
                            <tr>
                              <td>CONSTITUENCY:</td>
                              <td>{{$profile->Constituency}}</td>
                            </tr>
                            @endforeach
                        </table>
                        @if(Auth::User()->is_Admin==1)
                        <div class="text-center">
                          <a href="{{route('edit_details', $profile->id)}}" class="btn btn-primary">Edit</a>
                        </div>
                        @endif
                    @else
                        <p>No profile information</p>
                    @endif
                </div>
            </div>
            </div>
          </div>
            {{-- <div class="card">
                <div class="card-header">profile</div>
                <div class="card-body">
                  @if(count($profiles) >0)
                        <table class="table table-responsive">
                            @foreach($profiles as $profile)
                            <tr>
                              <td>FIRSTNAME</td>
                              <td>{{$profile->Firstname}}</td>
                            </tr>
                            <tr>
                              <td>LASTNAME</td>
                              <td>{{$profile->Lastname}}</td>
                            </tr>
                            <tr>
                              <td>EMAIL</td>
                              <td>{{$profile->Email}}</td>
                            </tr>
                            <tr>
                              <td>TELEPHONE</td>
                              <td>{{$profile->Telephone}}</td>
                            </tr>
                            <tr>
                              <td>NATIONAL ID</td>
                              <td>{{$profile->National_ID}}</td>
                            </tr>
                            <tr>
                              <td>DATE OF BIRTH</td>
                              <td>{{$profile->Date_of_birth}}</td>
                            </tr>
                            <tr>
                              <td>GENDER</td>
                              <td>{{$profile->Gender}}</td>
                            </tr>
                            <tr>
                              <td>MARITAL STATUS</td>
                              <td>{{$profile->Marital_status}}</td>
                            </tr>
                            <tr>
                              <td>DISABILITY</td>
                              <td>{{$profile->Disability}}</td>
                            </tr>
                            <tr>
                              <td>NATIONALITY</td>
                              <td>{{$profile->Nationality}}</td>
                            </tr>
                            <tr>
                              <td>RELIGION</td>
                              <td>{{$profile->Religion}}</td>
                            </tr>
                            <tr>
                              <td>HOME ADDRESS</td>
                              <td>{{$profile->Home_address}}</td>
                            </tr>
                            <tr>
                              <td>COUNTY</td>
                              <td>{{$profile->County}}</td>
                            </tr>
                            <tr>
                              <td>SUB COUNTY</td>
                              <td>{{$profile->Subcounty}}</td>
                            </tr>
                            <tr>
                              <td>CONSTITUENCY</td>
                              <td>{{$profile->Constituency}}</td>
                            </tr>

                            @endforeach
                        </table>
                    @else
                        <p>No profile information</p>
                    @endif
                </div>
            </div> --}}
        </div>
    @endsection