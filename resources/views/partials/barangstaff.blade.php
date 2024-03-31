<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h3 class="card-title">Data Belanja Barang</h3>
                            </div>
                        </div>
                    </div>


                    <div class="card-body ">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kategori</th>
                                    <th>Nama Barang</th>
                                    <th>Kode Barang</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Stok</th>
                    
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no =1;
                                @endphp
                                @foreach ($data as $barang)
                                <tr>
                                    <th> {{ $no++ }}</th>
                                    <td>{{ $barang->categori->namaCategori }}</td>
                                    <td>{{ $barang->namaBarang }}</td>
                                    <td>{{ $barang->kodeBarang }}</td>
                                    <td>{{ $barang->hargaBeli }}</td>
                                    <td>{{ $barang->hargaJual }}</td>
                                    <td>{{ $barang->stok }}</td>
                            
                                </tr>

                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Kategori</th>
                                    <th>Nama Barang</th>
                                    <th>Kode Barang</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Stok</th>
                      
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>


            </div>

        </div>

    </div>

</section>