<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KelasKu | Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('sbadmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('sbadmin2/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!--ikon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-7 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">
                                            <i class="fas fa-user mr-2"></i>
                                            KelasKu | Login
                                        </h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('loginProses') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user 
                                            @error('email')
                                            is-invalid
                                            @enderror"
                                                placeholder="Masukkan Email" name="email" value="{{ old('email') }}">
                                                @error('email')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user  @error('email')
                                            is-invalid
                                            @enderror"
                                            placeholder=" Masukkan Password" name="password">
                                            @error('password')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <small>
                                        Kembali Ke Beranda?
                                        <a href="{{ route('welcome') }}">Klik Disini</a>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('sbadmin2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('sbadmin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('sbadmin2/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('sweetalert2/dist/sweetalert2.all.min.js') }}"></script>

    @session('success')
    <script>
        Swal.fire({
        title: "Sukses",
        text: "{{ session('success') }}",
        icon: "success"
    });
    </script>
    @endsession

    @session('error')
    <script>
        Swal.fire({
        title: "Gagal",
        text: "{{ session('error') }}",
        icon: "error"
    });
    </script>

    @endsession


</body>

</html>