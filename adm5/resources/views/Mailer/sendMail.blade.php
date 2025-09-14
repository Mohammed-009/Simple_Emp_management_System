@extends('auth.Layout_logins.master')
    @section('content')
    <div class="container mt-5" style="max-width: 750px">
  
        <h1>Send Email</h1>
      
        <form method="post" action="{{ route('storeMail') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Recipient Email:</label>
                <input type="email" name="email" class="form-control" />
            </div>
            <div class="form-group">
                <label>Subject:</label>
                <input type="text" name="subject" class="form-control" />
            </div>
            <div class="form-group">
                <label>Body:</label>
                <textarea class="form-control" name="body"></textarea>
            </div>
            <div class="form-group mt-3 mb-3">
                <button type="submit" class="btn btn-success btn-block">Send Email</button>
            </div>
        </form>
    </div>
    @endsection