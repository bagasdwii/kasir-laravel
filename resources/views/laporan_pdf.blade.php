<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan - Toko Kamto</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .address {
            margin-top: 20px;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="text-center">
                    <h3 class="mt-4 mb-4">Laporan {{ $title }} - Toko Kamto</h3>
          
                    <div class="address">
                        <p>Dsn. Brangkal Ds. Kedungpanji, Kec. Lembeyan, Kabupaten Magetan, Jawa Timur 63372</p>
                        <p>{{$tanggalawal->format('d-m-Y') }} - {{ $tanggalakhir->format('d-m-Y') }}</p>
                    </div>
                </div>
               
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1 @endphp
                            @foreach($reports as $report)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $report->created_at->format('d-m-Y')}}</td>
                                <td>{{ $report->barang->namaBarang }}</td>
                                <td>{{ $report->jumlah }}</td>
                                <td>Rp {{ number_format($report->harga, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($report->subTotal, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5">Total</th>
                                <td>Rp {{ number_format($reports->sum('subTotal'), 0, ',', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
              
            </div>
        </div>
    </div>
</body>
</html>
