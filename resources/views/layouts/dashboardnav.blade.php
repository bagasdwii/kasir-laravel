<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Webkasirku</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.css">

    <link rel="stylesheet" href="/AdminLTE-3.2.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <link rel="stylesheet" href="/AdminLTE-3.2.0/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="/AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="/AdminLTE-3.2.0/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/AdminLTE-3.2.0/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <script nonce="8b268c9f-2294-43d0-bbed-20ac877253fb">try { (function (w, d) { !function (lD, lE, lF, lG) { lD[lF] = lD[lF] || {}; lD[lF].executed = []; lD.zaraz = { deferred: [], listeners: [] }; lD.zaraz.q = []; lD.zaraz._f = function (lH) { return async function () { var lI = Array.prototype.slice.call(arguments); lD.zaraz.q.push({ m: lH, a: lI }) } }; for (const lJ of ["track", "set", "debug"]) lD.zaraz[lJ] = lD.zaraz._f(lJ); lD.zaraz.init = () => { var lK = lE.getElementsByTagName(lG)[0], lL = lE.createElement(lG), lM = lE.getElementsByTagName("title")[0]; lM && (lD[lF].t = lE.getElementsByTagName("title")[0].text); lD[lF].x = Math.random(); lD[lF].w = lD.screen.width; lD[lF].h = lD.screen.height; lD[lF].j = lD.innerHeight; lD[lF].e = lD.innerWidth; lD[lF].l = lD.location.href; lD[lF].r = lE.referrer; lD[lF].k = lD.screen.colorDepth; lD[lF].n = lE.characterSet; lD[lF].o = (new Date).getTimezoneOffset(); if (lD.dataLayer) for (const lQ of Object.entries(Object.entries(dataLayer).reduce(((lR, lS) => ({ ...lR[1], ...lS[1] })), {}))) zaraz.set(lQ[0], lQ[1], { scope: "page" }); lD[lF].q = []; for (; lD.zaraz.q.length;) { const lT = lD.zaraz.q.shift(); lD[lF].q.push(lT) } lL.defer = !0; for (const lU of [localStorage, sessionStorage]) Object.keys(lU || {}).filter((lW => lW.startsWith("_zaraz_"))).forEach((lV => { try { lD[lF]["z_" + lV.slice(7)] = JSON.parse(lU.getItem(lV)) } catch { lD[lF]["z_" + lV.slice(7)] = lU.getItem(lV) } })); lL.referrerPolicy = "origin"; lL.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(lD[lF]))); lK.parentNode.insertBefore(lL, lK) };["complete", "interactive"].includes(lE.readyState) ? zaraz.init() : lD.addEventListener("DOMContentLoaded", zaraz.init) }(w, d, "zarazData", "script"); })(window, document) } catch (e) { throw fetch("/cdn-cgi/zaraz/t"), e; };
    </script>

    <style>
        input:-webkit-autofill {
            -webkit-text-fill-color: #000 !important;
            /* Warna teks hitam */
        }

        .select2>.selection>.select2-selection {
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

            <a href="/dashboard" class="brand-link">
                
                <span class="brand-text font-weight-light ml-3">Webkasirku</span>
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

    <script src="/AdminLTE-3.2.0/plugins/moment/moment.min.js"></script>
    <script src="/AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.js"></script>

    <script src="/AdminLTE-3.2.0/plugins/flot/jquery.flot.js"></script>

    <script src="/AdminLTE-3.2.0/plugins/flot/plugins/jquery.flot.resize.js"></script>
    
    <script src="/AdminLTE-3.2.0/plugins/flot/plugins/jquery.flot.pie.js"></script>

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
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
        
    </script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();

        });

    </script>
    <script>
        $(document).ready(function () {
            $('#barang_id').change(function () {
                var barangId = $(this).val();
                $.ajax({
                    url: '/get-harga/' + barangId, // Ganti dengan URL yang sesuai untuk mendapatkan harga beli
                    type: 'GET',
                    success: function (response) {
                        $('#harga').val(response.hargaBeli);
                        calculateSubtotal();
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });

            $('#jumlah').on('input', function () {
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

    <script>
        $('#kembali').on('input', function () {
            var kembali = parseInt($(this).val());
            var maxKembali = parseInt($(this).attr('max'));

            if (kembali > maxKembali) {
                $(this).val(maxKembali);
            }
        });
    </script>
    <script>

        $('#pembelian_id, #barang_id').on('change', function () {
            // Ambil nilai dari input noFaktur dan barang_id
            var pembelian_id = $('#pembelian_id').val();
            var barangId = $('#barang_id').val();

            // Lakukan permintaan AJAX
            $.ajax({
                type: 'GET',
                url: '/get-jumlah-by-detailpembelian',
                data: {
                    pembelian_id: pembelian_id,
                    barang_id: barangId
                },
                success: function (response) {
                    // Mengisi nilai input jumlah dengan nilai yang ditemukan dari detail pembelian
                    $('#jumlah-detail-pembelian').val(response.jumlah);

                    // Ambil nilai maksimum dari jumlah yang ditemukan
                    var maxJumlah = parseInt(response.jumlah);

                    // Batasi nilai yang dimasukkan oleh pengguna ke maksimum jumlah yang ditemukan
                    $('#jumlah-detail-pembelian').attr('max', maxJumlah);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

    </script>

    </script>
    <script>
        $(document).ready(function () {
            $('#example2penjualan').DataTable({
                "paging": false
                "search": false;


            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#example2penjualan2').DataTable({
                "paging": false
                "search": false;
            });
        });
    </script>
  
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var shoppingItems = [];
            var paymentData = {
                bayar: 0,
                total: 0,
                kembalian: 0
            };

            var stockValues = {}; // Objek untuk menyimpan nilai stok

            function updateShoppingTable() {
                var shoppingTableBody = document.querySelector('#example2penjualan2 tbody');
                shoppingTableBody.innerHTML = '';
                var totalBelanja = 0;

                shoppingItems.forEach(function (item) {
                    var newRow = document.createElement('tr');
                    totalBelanja += item.subtotal;
                    newRow.innerHTML = '<td>' + item.nama + '</td><td>' + item.harga + '</td><td>' + item.stok + '</td><td>' + item.subtotal + '</td>';
                    shoppingTableBody.appendChild(newRow);
                });

                var footerRow = document.querySelector('#example2penjualan2 tfoot');
                if (shoppingItems.length > 0) {
                    footerRow.innerHTML = '<th colspan="3">Total Belanja</th><td>' + totalBelanja + '</td>';
                    document.getElementById('bayar').style.display = 'block';
                } else {
                    footerRow.innerHTML = '';
                    document.getElementById('bayar').style.display = 'none';
                }

                // Perbarui nilai total pembayaran
                paymentData.total = totalBelanja;
            }

            function showBayarModal(totalHarga) {
                var totalHargaInput = document.getElementById('totalHarga');
                totalHargaInput.value = totalHarga;
                $('#bayarModal').modal('show');
            }

            document.getElementById('bayar').addEventListener('click', function () {
                showBayarModal(paymentData.total);
            });

            document.getElementById('uang').addEventListener('input', function () {
                paymentData.bayar = parseFloat(this.value);
                paymentData.kembalian = paymentData.bayar - paymentData.total;
                document.getElementById('kembali').value = paymentData.kembalian;

                if (paymentData.kembalian <= 0 || isNaN(paymentData.kembalian)) {
                    document.getElementById('bayarBtn').style.display = 'none';
                    document.getElementById('cetakBtn').style.display = 'none';
                } else {
                    document.getElementById('bayarBtn').style.display = 'block';
                    document.getElementById('cetakBtn').style.display = 'block';
                }
            });

            function calculateTotalHarga() {
                var totalHarga = shoppingItems.reduce(function (total, item) {
                    return total + (item.harga * item.stok);
                }, 0);

                return totalHarga;
            }

            document.getElementById('bayarBtn').addEventListener('click', function (e) {
                e.preventDefault();

                var formData = {
                    shoppingItems: shoppingItems,
                    paymentData: paymentData
                };
                console.log(formData);
                $.ajax({
                    type: 'POST',
                    url: '/tambahpenjualan',
                    data: JSON.stringify(formData),
                    contentType: 'application/json',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                    },
                    success: function (response) {
                        console.log(response);
                        $('#bayarModal').modal('hide');
                        $('#uang').val('');
                        shoppingItems = [];
                        updateShoppingTable();
                        paymentData.bayar = 0;
                        paymentData.total = 0;
                        paymentData.kembalian = 0;

                        if (response.success) {
                            document.location.href = "{{ route('penjualan') }}";
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('Terjadi kesalahan saat memproses pembayaran. Silakan coba lagi.');
                    }
                });
            });
          
            document.getElementById('cetakBtn').addEventListener('click', function () {
                cetakNota(shoppingItems, paymentData);
                
                var formData = {
                    shoppingItems: shoppingItems,
                    paymentData: paymentData
                };

                $.ajax({
                    type: 'POST',
                    url: '/tambahpenjualan',
                    data: JSON.stringify(formData),
                    contentType: 'application/json',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                    },
                    success: function (response) {
                        console.log(response);
                        $('#bayarModal').modal('hide');
                        $('#uang').val('');
                        shoppingItems = [];
                        updateShoppingTable();
                        paymentData.bayar = 0;
                        paymentData.total = 0;
                        paymentData.kembalian = 0;

                        if (response.success) {
                            document.location.href = "{{ route('penjualan') }}";
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('Terjadi kesalahan saat mengirim data ke database. Silakan coba lagi.');
                    }
                });
            });

            document.getElementById('cetakBtn').addEventListener('click', function () {
                cetakNota(shoppingItems, paymentData);

            });
    
            // function cetakNota(shoppingItems, paymentData) {
            //     var notaWindow = window.open('', 'PRINT', 'height=600,width=100');
    
            //     notaWindow.document.write('<html><head><title>Nota Belanja</title>');
            //     notaWindow.document.write('<style>');
            //     notaWindow.document.write('@page { margin: 0 }');
            //     notaWindow.document.write('body { margin: 0; font-size:10px;font-family: monospace; font-family: Arial, sans-serif; font-size: 12px; }');
            //     notaWindow.document.write('td { font-size:10px; }');
            //     notaWindow.document.write('.sheet { margin: 0;overflow: hidden; position: relative; box-sizing: border-box; page-break-after: always;}');
            //     notaWindow.document.write('body.struk        .sheet { width: 58mm; }');
            //     notaWindow.document.write('body.struk .sheet { padding: 2mm; }');
            //     notaWindow.document.write('.txt-left { text-align: left;}');
            //     notaWindow.document.write('.txt-center { text-align: center;}');
            //     notaWindow.document.write('.txt-right { text-align: right;}');
            //     notaWindow.document.write('@media screen {body { background: #e0e0e0;font-family: monospace; }.sheet {background: white;box-shadow: 0 .5mm 2mm rgba(0,0,0,.3);margin: 5mm;}}');
            //     notaWindow.document.write('@media print {body { font-family: monospace; }body.struk { width: 58mm; text-align: left;}body.struk .sheet { padding: 2mm; }.txt-left { text-align: left;}.txt-center { text-align: center;}.txt-right { text-align: right;}}');
            //     notaWindow.document.write('</style>');
            //     notaWindow.document.write('</head><body class="struk">');
            //     notaWindow.document.write('<table cellpadding="0" cellspacing="0">');
            //     notaWindow.document.write('<tr><td>Toko Kamto</td></tr>');
            //     notaWindow.document.write('<tr><td>Dsn. Brangkal Ds. KedungPanji Kec. Lembeyan, Kabupaten Magetan Jawa Timur 63372</td></tr></table>');
            //     notaWindow.document.write('<p>---------------------------------</p>');
            //     notaWindow.document.write('<p>Tanggal: ' + new Date().toLocaleString() + '</p>');
            //     notaWindow.document.write('<p>---------------------------------</p>');
    
            //     notaWindow.document.write('<table>');
            //     notaWindow.document.write('<thead><tr><th>Nama</th><th>Harga</th><th>Jumlah</th><th>Subtotal</th></tr></thead>');
            //     notaWindow.document.write('<tbody>');
    
            //     shoppingItems.forEach(function (item) {
            //         notaWindow.document.write('<tr><td>' + item.nama + '</td><td>' + item.harga.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' }) + '</td><td>' + item.stok + '</td><td>' + item.subtotal.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' }) + '</td></tr>');
            //     });
    
            //     notaWindow.document.write('</tbody>');
            //     notaWindow.document.write('</table>');
    
            //     notaWindow.document.write('<p>---------------------------------</p>');
            //     notaWindow.document.write('<p class="total">Total: ' + paymentData.total.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' }) + '</p>');
            //     notaWindow.document.write('<p class="bayar">Bayar: ' + paymentData.bayar.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' }) + '</p>');
            //     notaWindow.document.write('<p class="kembalian">Kembalian: ' + paymentData.kembalian.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' }) + '</p>');
            //     notaWindow.document.write('<p>---------------------------------</p>');
            //     notaWindow.document.write('<p>Terima kasih telah berbelanja!</p>');
    
            //     notaWindow.document.write('</body></html>');
    
            //     notaWindow.document.close();
            //     notaWindow.focus();
            //     notaWindow.print();
            //     notaWindow.close();
            // }
            function cetakNota(shoppingItems, paymentData) {
                var notaWindow = window.open('', 'PRINT', 'height=600,width=100');

                notaWindow.document.write('<html><head><title>Nota Belanja</title>');
                notaWindow.document.write('<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">');
                notaWindow.document.write('<style>');
                notaWindow.document.write('@page { margin: 0 }');
                notaWindow.document.write('body { margin: 0; font-size:12px; font-family: Roboto, Arial, sans-serif; }');
                notaWindow.document.write('.sheet { width: 58mm; padding: 10px; box-sizing: border-box; }');
                notaWindow.document.write('table { width: 100%; border-collapse: collapse; }');
                notaWindow.document.write('td, th { padding: 5px; font-size: 12px; }');
                notaWindow.document.write('.txt-left { text-align: left; }');
                notaWindow.document.write('.txt-center { text-align: center; }');
                notaWindow.document.write('.txt-right { text-align: right; }');
                notaWindow.document.write('hr { border: none; border-top: 1px solid #000; margin: 10px 0; }');
                notaWindow.document.write('.bold { font-weight: bold; }');
                notaWindow.document.write('</style>');
                notaWindow.document.write('</head><body>');
                notaWindow.document.write('<div class="sheet">');
                
                // Header toko
                notaWindow.document.write('<p class="txt-center bold"><strong>Toko Kamto</strong><br>');
                notaWindow.document.write('Dsn. Brangkal Ds. KedungPanji Kec. Lembeyan, Kabupaten Magetan Jawa Timur 63372<br>');
                notaWindow.document.write('Telp. 0812-3456-7890</p>');
                
                // Tanggal
                notaWindow.document.write('<p class="txt-center bold">' + new Date().toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' }) + '</p>');
                
                // Garis pemisah
                notaWindow.document.write('<hr>');
                
                // Daftar belanjaan
                shoppingItems.forEach(function (item) {
                    notaWindow.document.write('<p>' + item.nama + '<br>');
                    notaWindow.document.write('Rp. ' + item.harga.toLocaleString('id-ID') + '  X' + item.stok + '  Rp. ' + item.subtotal.toLocaleString('id-ID') + '</p>');
                });

                // Garis pemisah
                notaWindow.document.write('<hr>');

                // Total belanja, bayar, dan kembalian
                notaWindow.document.write('<p class="txt-right bold" style="padding-right:10px";>Total Belanja  Rp. ' + paymentData.total.toLocaleString('id-ID') + '<br>');
                notaWindow.document.write('Tunai  Rp. ' + paymentData.bayar.toLocaleString('id-ID') + '<br>');
                notaWindow.document.write('Kembali  Rp. ' + paymentData.kembalian.toLocaleString('id-ID') + '</p>');
                
                // Garis pemisah
                notaWindow.document.write('<hr>');
                
                // Pesan penutup
                notaWindow.document.write('<p class="txt-center bold">Terima Kasih</p>');
                
                notaWindow.document.write('</div>');
                notaWindow.document.write('</body></html>');

                notaWindow.document.close();
                notaWindow.focus();
                notaWindow.print();
                notaWindow.close();
            }

            function addStockEventListener(stockInput, barang) {
                stockInput.addEventListener('input', function () {
                    var value = parseInt(this.value);
                    var row = this.closest('tr');
                    var kode = barang.kodeBarang;
                    var nama = barang.namaBarang;
                    var harga = parseFloat(barang.hargaJual);
                    var stok = parseInt(barang.stok);
    
                    stockValues[nama] = value; // Simpan nilai stok di stockValues
    
                    var foundItem = shoppingItems.find(item => item.nama === nama);
                    if (foundItem) {
                        if (value > 0 && value <= stok) {
                            foundItem.stok = value;
                            foundItem.subtotal = value * foundItem.harga;
                        } else {
                            var index = shoppingItems.indexOf(foundItem);
                            shoppingItems.splice(index, 1);
                        }
                    } else if (value > 0 && value <= stok) {
                        var subtotal = value * harga;
                        shoppingItems.push({ kode: kode, nama: nama, harga: harga, stok: value, subtotal: subtotal });
                    } else {
                        this.value = 0;
                    }
    
                    updateShoppingTable();
                });
            }
            document.getElementById('searchInputPenjualan').focus();
    
            const searchInput = document.getElementById('searchInputPenjualan');
            const barangTableBody = document.getElementById('barangTableBody');
    
            searchInput.addEventListener('input', function () {
                const query = searchInput.value.trim();
    
                fetch(`/search-barang?query=${encodeURIComponent(query)}`)
                    .then(response => response.json())
                    .then(data => {
                        barangTableBody.innerHTML = '';
    
                        if (data.length > 0) {
                            data.forEach(barang => {
                                const row = document.createElement('tr');
    
                                row.innerHTML = `
                                    <td>${barang.kodeBarang}</td>
                                    <td>${barang.namaBarang}</td>
                                    <td>${barang.hargaJual}</td>
                                    <td>${barang.stok}</td>
                                    <td class="text-center">
                                        <input type="number" class="stock form-control" value="${stockValues[barang.namaBarang] || 0}" min="0" max="${barang.stok}" style="width: 100px;">
                                    </td>
                                `;
    
                                barangTableBody.appendChild(row);
    
                                var stockInput = row.querySelector('.stock');
                                addStockEventListener(stockInput, barang);
                            });
                        } else {
                            const emptyRow = document.createElement('tr');
                            emptyRow.innerHTML = '<td colspan="5" class="text-center">Tidak ada data ditemukan</td>';
                            barangTableBody.appendChild(emptyRow);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
        document.getElementById('searchInputPenjualan').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();

                var searchValue = this.value.trim().toLowerCase(); // Mengambil nilai pencarian, menghapus spasi ekstra, dan menjadikan lowercase
                
                var rows = document.querySelectorAll('#example2penjualan tbody tr');
                var foundItems = [];

                // Loop melalui setiap baris untuk mencari barang yang cocok dengan pencarian
                rows.forEach(function(row) {
                    var kode = row.querySelector('td:nth-child(1)').innerText.toLowerCase();
                    var nama = row.querySelector('td:nth-child(2)').innerText.toLowerCase();
                    var stockInput = row.querySelector('.stock');
                    var maxStock = parseInt(stockInput.max);

                    if (kode.includes(searchValue) || nama.includes(searchValue)) {
                        foundItems.push(row);
                    } else {
                        row.style.display = 'none'; // Sembunyikan baris yang tidak sesuai dengan pencarian
                    }
                });

                // Jika hanya satu item yang ditemukan dan jumlahnya kurang dari maksimum, tambahkan ke "Data Belanja Barang"
                if (foundItems.length === 1) {
                    var foundItem = foundItems[0];
                    var stockInput = foundItem.querySelector('.stock');
                    var currentStock = parseInt(stockInput.value);
                    var maxStock = parseInt(stockInput.max);

                    if (currentStock < maxStock) {
                        stockInput.value = currentStock + 1;
                        stockInput.dispatchEvent(new Event('input'));
                    }
                }

                // Kosongkan nilai input setelah selesai pencarian
                this.value = '';

                // Fokus kembali ke input pencarian
                this.focus();

                // Tampilkan kembali semua baris
                rows.forEach(function(row) {
                    row.style.display = '';
                });
            }
        });

    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Fungsi untuk menampilkan modal bayar dengan total harga
            function showBayarModal(totalHarga) {
                // Mengambil elemen input total harga di dalam modal bayar
                var totalHargaInput = document.getElementById('totalHarga');

                // Mengisi nilai total harga pada input di dalam modal
                totalHargaInput.value = totalHarga;

                // Menampilkan modal bayar
                $('#bayarModal').modal('show');
            }

            // Event listener untuk tombol bayar
            document.getElementById('bayar').addEventListener('click', function() {
                // Mengambil total harga dari "Data Belanja Barang"
                var totalHarga = calculateTotalHarga();

                // Menampilkan modal bayar dengan total harga
                showBayarModal(totalHarga);
            });

            // Event listener untuk input uang
            document.getElementById('uang').addEventListener('input', function() {
                // Mengambil nilai uang dari input
                var uang = parseFloat(this.value);
                // Mengambil total harga dari "Data Belanja Barang"
                var totalHarga = parseFloat(document.getElementById('totalHarga').value);

                // Menghitung kembalian
                var kembalian = uang - totalHarga;

                // Menampilkan kembalian pada input kembalian
                document.getElementById('kembali').value = kembalian;

                // Menyembunyikan tombol bayar jika kembalian kurang dari atau sama dengan 0
                if (kembalian <0 || isNaN(kembalian)) {
                    document.getElementById('bayarBtn').style.display = 'none';
                    document.getElementById('cetakBtn').style.display = 'none';

                } else {
                    document.getElementById('bayarBtn').style.display = 'block';
                    document.getElementById('cetakBtn').style.display = 'block';

                }
            });

            // Fungsi untuk menghitung total harga dari "Data Belanja Barang"
            function calculateTotalHarga() {
                var shoppingItems = []; // Daftar barang dari "Data Belanja Barang"
                // Mendapatkan daftar barang dari "Data Belanja Barang"
                var rows = document.querySelectorAll('#example2penjualan2 tbody tr');
                // Loop melalui setiap baris dan menambahkan informasi barang ke dalam daftar
                rows.forEach(function(row) {
                    var nama = row.querySelector('td:nth-child(1)').innerText;
                    var harga = parseFloat(row.querySelector('td:nth-child(2)').innerText);
                    var stok = parseInt(row.querySelector('td:nth-child(3)').innerText);
                    shoppingItems.push({ nama: nama, harga: harga, stok: stok });
                });

                // Menghitung total harga
                var totalHarga = shoppingItems.reduce(function(total, item) {
                    return total + (item.harga * item.stok);
                }, 0);

                return totalHarga;
            }
        });
    </script>
    <script>
        $(function() {
            //Initialize the date range picker
            $('#dateRange').daterangepicker({
                locale: {
                    format: 'YYYY-MM-DD'
                }
            });
        });
    </script>
    {{-- <script>
        var bar_data = {
            data : [[1,10], [2,8], [3,4], [4,13], [5,17], [6,9]],
            bars: { show: true }
        }
        $.plot('#bar-chart', [bar_data], {
        grid  : {
            borderWidth: 1,
            borderColor: '#f3f3f3',
            tickColor  : '#f3f3f3'
        },
        series: {
            bars: {
            show: true, barWidth: 0.5, align: 'center',
            },
        },
        colors: ['#3c8dbc'],
        xaxis : {
            ticks: [[1,'Januari'], [2,'Februari'], [3,'Maret'], [4,'April'], [5,'Mei'], [6,'Juni,'],
            [7,'Juli'], [8,'Agustus'], [9,'September'], [10,'Oktober'], [11,'November'], [12,'Desember,']]
        }
        })
    </script> --}}
    @yield('dashboardchart')
    
    <script>
        var bar_data = {
            data : [[7,10], [8,8], [9,4], [10,13], [11,17], [12,100]],
            bars: { show: true }
        }
        $.plot('#bar-chart2', [bar_data], {
        grid  : {
            borderWidth: 1,
            borderColor: '#f3f3f3',
            tickColor  : '#f3f3f3'
        },
        series: {
            bars: {
            show: true, barWidth: 0.5, align: 'center',
            },
        },
        colors: ['#3c8dbc'],
        xaxis : {
            ticks: [[7,'Juli'], [8,'Agustus'], [9,'September'], [10,'Oktober'], [11,'November'], [12,'Desember,']]
        }
        })
    </script>


</body>

</html>