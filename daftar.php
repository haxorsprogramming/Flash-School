<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrasi User - Flash School</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" , shrink-to-fit="no">
    <!-- base:css -->
    <link rel="stylesheet" href="ladun/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="ladun/vendors/base/vendor.bundle.base.css">
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@700&family=Nunito:wght@600&display=swap" rel="stylesheet">
    <!-- endinject -->
    <link rel="stylesheet" href="ladun/css/style.css">
    <!-- endinject -->
</head>

<body style="font-family: 'Nunito', sans-serif;">
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="main-panel">
                <div class="content-wrapper d-flex align-items-center auth px-0">
                    <div class="row w-100 mx-0">
                        <div class="col-lg-4 mx-auto">
                            <div class="auth-form-light text-left py-5 px-4 px-sm-5" id="daftar-app">
                                <div class="brand-logo" style='text-align:center;'>
                                    <img src="./img/logo.png" alt="logo" style="width:150px;">
                                    <h3 style="font-weight:bold;margin-top:40px;">Flash School - Registrasi User</h3>
                                </div>
                                <div style="text-align:center;" id="divFormPendaftaran">
                                    <h6 class="font-weight-light">Harap isi field.</h6>
                                    <div>
                                        <div class="pt-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="txtNamaLengkap" placeholder="Nama Lengkap">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="txtUsername" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" type="password" id="txtPassword" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" id="txtTipeUser">
                                                    <option value="none">-- Tipe User --</option>
                                                    <option value="siswa">Siswa</option>
                                                    <option value="guru">Guru</option>
                                                </select>
                                            </div>
                                            <div id='capNotifLogin'>

                                            </div>
                                            <div class="mt-3">
                                                <a id="btnMasuk" v-on:click="daftarAtc()" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="#!">Masuk</a>
                                            </div>

                                            <div class="mt-5 text-muted text-center">
                                                Sudah punya akun? Silahkan <a href="login.php">Login</a>
                                            </div>

                                            <div class="mt-2">
                                                <div style='padding-top:12px;'>
                                                    <hr />
                                                    <h5 class="font-weight-light">Develop By : {{developer}}</h5>
                                                    <strong></strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="divSucessDaftar" style="margin-top:30px;text-align:center;display:none;">
                                    <h2 class="font-weight-light">Pendaftaran Sukses</h2>
                                    <img src="./img/success-registrasi.png" style="width: 400px;">
                                    <br /><br />
                                    <p>Silahkan lakukan pembayaran biaya pendaftaran sebesar Rp. 75.000, ke nomor
                                        rekening, kemudian lakukan konfirmasi pembayaran pada saat masuk ke aplikasi. Terima kasih</p>
                                    <div class="mt-5 text-muted text-center">
                                        Sudah lakukan pembayaran? Silahkan <a href="login.php">Login</a>
                                    </div>
                                    <div class="mt-2">
                                        <div style='padding-top:12px;'>
                                            <hr />
                                            <h5 class="font-weight-light">Develop By : {{developer}}</h5>
                                            <strong></strong>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                </div>
                <!-- page-body-wrapper ends -->
            </div>
            <!-- container-scroller -->
            <!-- base:js -->
            <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

            <script src="ladun/vendors/base/vendor.bundle.base.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
            <!-- endinject -->
            <!-- inject:js -->
            <script src="ladun/js/template.js"></script>
            <!-- endinject -->
            <script>
                const server = "http://localhost/bimbelku/";
            </script>
            <script src="ladun/daftar/daftar.js"></script>
</body>

</html>