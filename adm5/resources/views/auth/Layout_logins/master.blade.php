<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Employee system</title>

                 <!--STYLES-->
                {{-- <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}"> --}}
                 <link rel="stylesheet" href="{{asset('css/custom.css')}}"> 
                {{-- <script src="{{asset('js/Jquery.js')}}"></script>
                <script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>   --}}

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{asset('Admin/css/styles.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://github.com/zanysoft/laravel-zip">
        
        {{-- notifications links --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"> --}}
        {{-- end notifications --}}

    </head>
    <body class="sb-nav-fixed">
        @include('HFS_overall.header')
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @include('HFS_overall.sidebar')
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <br>
                    @yield('content')
                </main>
                @include('HFS_overall.footer')
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('Admin/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('Admin/assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('Admin/assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('Admin/js/datatables-simple-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> --}}
        {{-- <script>
            @if (Session::has('message'))
            toastr.options= {
                "progressBar" : true,
                "closeButton" : true,
            }
                toastr.success("{{Session::get('message')}}", 'Success!', {timeOut:12000});
                toastr.info("Session::get('message')");
                toastr.warning("Session::get('message')");
                toastr.error("Session::get('message')"); 
            @endif
        </script> --}}

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: "{{ $error }}",
                            timer: 6000,
                            timerProgressBar: true,
                            showCloseButton: true,
                            customClass: {
                        popup: 'custom-swal'
                    }
        
                        });
                    @endforeach
                @endif
        
                @if (Session::has('error'))
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: "{{ session('error') }}",
                        timer: 6000,
                        timerProgressBar: true,
                        showCloseButton: true,
                        customClass: {
                        popup: 'custom-swal'
                    }
                    });
                @endif
        
                @if (Session::has('success'))
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: "{{ session('success') }}",
                        timer: 3000,
                        timerProgressBar: true,
                        showCloseButton: true,
                        customClass: {
                        popup: 'custom-swal'
                    }
                    });
                @endif
        
                @if (Session::has('info'))
                    Swal.fire({
                        icon: 'info',
                        title: 'Info',
                        text: "{{ session('info') }}",
                        timer: 6000,
                        timerProgressBar: true,
                        showCloseButton: true,
                        customClass: {
                        popup: 'custom-swal'
                    }
                    });
                @endif
                @if (Session::has('warning'))
                    Swal.fire({
                        icon: 'warning',
                        title: 'Warning',
                        text: "{{ session('warning') }}",
                        timer: 6000,
                        timerProgressBar: true,
                        showCloseButton: true,
                        customClass: {
                        popup: 'custom-swal'
                    }
                    });
                @endif
            });
        </script>
    </body>
</html>
