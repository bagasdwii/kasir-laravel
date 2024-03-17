<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard 2</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <link rel="stylesheet" href="AdminLTE-3.2.0/dist/css/adminlte.min.css?v=3.2.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="AdminLTE-3.2.0/dist/css/adminlte.min.css?v=3.2.0">
    <script
        nonce="d51f2332-52ed-477a-8293-5fbe63b6a0c9">try { (function (w, d) { !function (du, dv, dw, dx) { du[dw] = du[dw] || {}; du[dw].executed = []; du.zaraz = { deferred: [], listeners: [] }; du.zaraz.q = []; du.zaraz._f = function (dy) { return async function () { var dz = Array.prototype.slice.call(arguments); du.zaraz.q.push({ m: dy, a: dz }) } }; for (const dA of ["track", "set", "debug"]) du.zaraz[dA] = du.zaraz._f(dA); du.zaraz.init = () => { var dB = dv.getElementsByTagName(dx)[0], dC = dv.createElement(dx), dD = dv.getElementsByTagName("title")[0]; dD && (du[dw].t = dv.getElementsByTagName("title")[0].text); du[dw].x = Math.random(); du[dw].w = du.screen.width; du[dw].h = du.screen.height; du[dw].j = du.innerHeight; du[dw].e = du.innerWidth; du[dw].l = du.location.href; du[dw].r = dv.referrer; du[dw].k = du.screen.colorDepth; du[dw].n = dv.characterSet; du[dw].o = (new Date).getTimezoneOffset(); if (du.dataLayer) for (const dH of Object.entries(Object.entries(dataLayer).reduce(((dI, dJ) => ({ ...dI[1], ...dJ[1] })), {}))) zaraz.set(dH[0], dH[1], { scope: "page" }); du[dw].q = []; for (; du.zaraz.q.length;) { const dK = du.zaraz.q.shift(); du[dw].q.push(dK) } dC.defer = !0; for (const dL of [localStorage, sessionStorage]) Object.keys(dL || {}).filter((dN => dN.startsWith("_zaraz_"))).forEach((dM => { try { du[dw]["z_" + dM.slice(7)] = JSON.parse(dL.getItem(dM)) } catch { du[dw]["z_" + dM.slice(7)] = dL.getItem(dM) } })); dC.referrerPolicy = "origin"; dC.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(du[dw]))); dB.parentNode.insertBefore(dC, dB) };["complete", "interactive"].includes(dv.readyState) ? zaraz.init() : du.addEventListener("DOMContentLoaded", zaraz.init) }(w, d, "zarazData", "script"); })(window, document) } catch (e) { throw fetch("/cdn-cgi/zaraz/t"), e; };</script>
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">

            {{--<div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__wobble" src="AdminLTE-3.2.0/dist/img/AdminLTELogo.png" alt="AdminLTELogo"
                    height="60" width="60">
            </div>--}}

            <nav class="main-header navbar navbar-expand navbar-dark">

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
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
                        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                            <i class="fas fa-search"></i>
                        </a>
                        <div class="navbar-search-block">
                            <form class="form-inline">
                                <div class="input-group input-group-sm">
                                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                        aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-navbar" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-comments"></i>
                            <span class="badge badge-danger navbar-badge">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <a href="#" class="dropdown-item">

                                <div class="media">
                                    <img src="dist/img/user1-128x128.jpg" alt="User Avatar"
                                        class="img-size-50 mr-3 img-circle">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            Brad Diesel
                                            <span class="float-right text-sm text-danger"><i
                                                    class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">Call me whenever you can...</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                    </div>
                                </div>

                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">

                                <div class="media">
                                    <img src="dist/img/user8-128x128.jpg" alt="User Avatar"
                                        class="img-size-50 img-circle mr-3">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            John Pierce
                                            <span class="float-right text-sm text-muted"><i
                                                    class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">I got your message bro</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                    </div>
                                </div>

                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">

                                <div class="media">
                                    <img src="dist/img/user3-128x128.jpg" alt="User Avatar"
                                        class="img-size-50 img-circle mr-3">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            Nora Silvester
                                            <span class="float-right text-sm text-warning"><i
                                                    class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">The subject goes here</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                    </div>
                                </div>

                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-warning navbar-badge">15</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-item dropdown-header">15 Notifications</span>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i> 4 new messages
                                <span class="float-right text-muted text-sm">3 mins</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-users mr-2"></i> 8 friend requests
                                <span class="float-right text-muted text-sm">12 hours</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-file mr-2"></i> 3 new reports
                                <span class="float-right text-muted text-sm">2 days</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                            <i class="fas fa-th-large"></i>
                        </a>
                    </li>
                </ul>
            </nav>


            <aside class="main-sidebar sidebar-dark-primary elevation-4">

                <a href="index3.html" class="brand-link">
                    <img src="AdminLTE-3.2.0/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">AdminLTE 3</span>
                </a>

                <div class="sidebar">

                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="AdminLTE-3.2.0/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                                alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">Alexander Pierce</a>
                        </div>
                    </div>

                    <div class="form-inline">

                    </div>

                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">

                            <li class="nav-item ">
                                <a href="/dashboard" class="nav-link active">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/karyawan" class="nav-link">
                                    <i class="nav-icon far fa-image"></i>
                                    <p>
                                        Karyawan
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <form id="logout-form" action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="nav-link">
                                        <i class="nav-icon far fa-image"></i>
                                        <p>
                                            Logout
                                        </p>
                                    </button>
                                </form>
                            </li>

                        </ul>
                    </nav>


                </div>

            </aside>

            @yield('container')


            

            <footer class="main-footer">
                <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 3.2.0
                </div>
            </footer>
            <aside class="control-sidebar control-sidebar-dark">

            </aside>

        </div>



        <script src="AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>

        <script src="AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script src="AdminLTE-3.2.0/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

        <script src="AdminLTE-3.2.0/dist/js/adminlte.js?v=3.2.0"></script>


        <script src="AdminLTE-3.2.0/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
        <script src="AdminLTE-3.2.0/plugins/raphael/raphael.min.js"></script>
        <script src="AdminLTE-3.2.0/plugins/jquery-mapael/jquery.mapael.min.js"></script>
        <script src="AdminLTE-3.2.0/plugins/jquery-mapael/maps/usa_states.min.js"></script>

        <script src="AdminLTE-3.2.0/plugins/chart.js/Chart.min.js"></script>

        <script src="AdminLTE-3.2.0/dist/js/demo.js"></script>

        <script src="AdminLTE-3.2.0/dist/js/pages/dashboard2.js"></script>

        {{-- ----------------------Tabel ---------------------- --}}

        
        <script src="AdminLTE-3.2.0/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

        

        <script src="AdminLTE-3.2.0/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="AdminLTE-3.2.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="AdminLTE-3.2.0/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="AdminLTE-3.2.0/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="AdminLTE-3.2.0/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="AdminLTE-3.2.0/plugins/jszip/jszip.min.js"></script>
        <script src="AdminLTE-3.2.0/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="AdminLTE-3.2.0/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

        <script src="AdminLTE-3.2.0/dist/js/adminlte.min.js?v=3.2.0"></script>

        

        <script>
            $(function () {
                $("#example1").DataTable({
                    "responsive": true, "lengthChange": false, "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>




</body>

</html>