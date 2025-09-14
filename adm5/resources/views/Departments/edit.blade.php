@extends('auth.Layout_logins.master')
    @section('content')
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Departments</div>
                        <div class="card-body">
                            <form action="{{route('updateDepartments', $department->id)}}" method="POST">
                                @csrf
                            <div class="form-group">
                                <label for="Department">Department name</label>
                                <input type="text" id="department" name="Department_name" value="{{$department->Department_name}}" class="form-control" required>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="Department description">Department description</label>
                                <textarea name="Department_description" id="description"  cols="30" rows="5" class="form-control" required>{{ $department->Department_description }}</textarea>
                            </div>

                            <div class="text-center">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group mt-3 mb-3">
                                            <button type="submit" class="btn btn-success btn-block">update</button>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group mt-3 mb-3">
                                            <button type="reset" class="btn btn-secondary btn-block">Reset</button>
                                        </div>
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