<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard 2</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="/AdminLTE-3.2.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <link rel="stylesheet" href="/AdminLTE-3.2.0/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="/AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="/AdminLTE-3.2.0/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/AdminLTE-3.2.0/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <script
        nonce="8b268c9f-2294-43d0-bbed-20ac877253fb">try { (function (w, d) { !function (lD, lE, lF, lG) { lD[lF] = lD[lF] || {}; lD[lF].executed = []; lD.zaraz = { deferred: [], listeners: [] }; lD.zaraz.q = []; lD.zaraz._f = function (lH) { return async function () { var lI = Array.prototype.slice.call(arguments); lD.zaraz.q.push({ m: lH, a: lI }) } }; for (const lJ of ["track", "set", "debug"]) lD.zaraz[lJ] = lD.zaraz._f(lJ); lD.zaraz.init = () => { var lK = lE.getElementsByTagName(lG)[0], lL = lE.createElement(lG), lM = lE.getElementsByTagName("title")[0]; lM && (lD[lF].t = lE.getElementsByTagName("title")[0].text); lD[lF].x = Math.random(); lD[lF].w = lD.screen.width; lD[lF].h = lD.screen.height; lD[lF].j = lD.innerHeight; lD[lF].e = lD.innerWidth; lD[lF].l = lD.location.href; lD[lF].r = lE.referrer; lD[lF].k = lD.screen.colorDepth; lD[lF].n = lE.characterSet; lD[lF].o = (new Date).getTimezoneOffset(); if (lD.dataLayer) for (const lQ of Object.entries(Object.entries(dataLayer).reduce(((lR, lS) => ({ ...lR[1], ...lS[1] })), {}))) zaraz.set(lQ[0], lQ[1], { scope: "page" }); lD[lF].q = []; for (; lD.zaraz.q.length;) { const lT = lD.zaraz.q.shift(); lD[lF].q.push(lT) } lL.defer = !0; for (const lU of [localStorage, sessionStorage]) Object.keys(lU || {}).filter((lW => lW.startsWith("_zaraz_"))).forEach((lV => { try { lD[lF]["z_" + lV.slice(7)] = JSON.parse(lU.getItem(lV)) } catch { lD[lF]["z_" + lV.slice(7)] = lU.getItem(lV) } })); lL.referrerPolicy = "origin"; lL.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(lD[lF]))); lK.parentNode.insertBefore(lL, lK) };["complete", "interactive"].includes(lE.readyState) ? zaraz.init() : lD.addEventListener("DOMContentLoaded", zaraz.init) }(w, d, "zarazData", "script"); })(window, document) } catch (e) { throw fetch("/cdn-cgi/zaraz/t"), e; };
    </script>

    <style>
        input:-webkit-autofill {
            -webkit-text-fill-color: #000 !important; /* Warna teks hitam */
        }
        .select2 > .selection > .select2-selection {
            padding: 0px;
        }
    </style>
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        {{--<div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="AdminLTE-3.2.0/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
                width="60">
        </div>--}}

        <nav class="main-header navbar navbar-expand navbar-dark">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">


                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

            </ul>
        </nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="index3.html" class="brand-link">
                <img src="/AdminLTE-3.2.0/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/AdminLTE-3.2.0/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ $loggedInUser->name }}</a>
                    </div>
                </div>

                <div class="form-inline">

                </div>

                @if(auth()->check() && auth()->user()->role === 'admin')
                    @include('partials.dashboardadmin')
                @elseif(auth()->check() && auth()->user()->role === 'staff')
                    @include('partials.dashboardstaff')
                @endif


                


            </div>

        </aside>

        @yield('container')



        <aside class="control-sidebar control-sidebar-dark">

        </aside>
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>


    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>

    <script src="/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="/AdminLTE-3.2.0/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <script src="/AdminLTE-3.2.0/dist/js/adminlte.js"></script>


    <script src="/AdminLTE-3.2.0/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="/AdminLTE-3.2.0/plugins/raphael/raphael.min.js"></script>
    <script src="/AdminLTE-3.2.0/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="/AdminLTE-3.2.0/plugins/jquery-mapael/maps/usa_states.min.js"></script>

    <script src="/AdminLTE-3.2.0/plugins/chart.js/Chart.min.js"></script>

    <script src="/AdminLTE-3.2.0/dist/js/demo.js"></script>
   
    <script src="/AdminLTE-3.2.0/dist/js/pages/dashboard2.js"></script>

    {{-- ----------------------Tabel ---------------------- --}}


    <script src="/AdminLTE-3.2.0/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>



    <script src="/AdminLTE-3.2.0/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/AdminLTE-3.2.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/AdminLTE-3.2.0/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/AdminLTE-3.2.0/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/AdminLTE-3.2.0/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/AdminLTE-3.2.0/plugins/jszip/jszip.min.js"></script>
    <script src="/AdminLTE-3.2.0/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/AdminLTE-3.2.0/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="/AdminLTE-3.2.0/plugins/select2/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>




    <script>
        $(function () {
                        //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
            theme: 'bootstrap4'
            })
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        
        });
        
    </script>
    <script>
        $(document).ready(function() {
            $('#barang_id').change(function() {
                var barangId = $(this).val();
                $.ajax({
                    url: '/get-harga/' + barangId, // Ganti dengan URL yang sesuai untuk mendapatkan harga beli
                    type: 'GET',
                    success: function(response) {
                        $('#harga').val(response.hargaBeli);
                        calculateSubtotal();
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });

            $('#jumlah').on('input', function() {
                calculateSubtotal();
            });

            function calculateSubtotal() {
                var harga = parseFloat($('#harga').val());
                var jumlah = parseInt($('#jumlah').val());
                var subtotal = harga * jumlah;
                $('#subTotal').val(subtotal);
                if (subtotal > 0) {
                    $('#subtotal-group').show();
                } else {
                    $('#subtotal-group').hide();
                }
            }
        });
    </script>




</body>

</html>