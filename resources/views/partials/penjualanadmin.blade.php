<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h3 class="card-title">Data Barang</h3>
                            </div>
                            <div class="col">
                                <input type="text" id="searchInputPenjualan" class="form-control" placeholder="Cari Kode atau Nama Barang">
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table id="example2penjualan" class="table table-bordered table-hover" style="overflow: auto; table-layout-fixed;">
                            <thead>
                                <tr>
                                    <th width="5px">Kode</th>
                                    <th>Barang</th>
                                    <th width="5px">Harga</th>
                                    <th width="5px">Stok</th>
                                    <th width="100px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody  id="barangTableBody">
                                {{-- @foreach ($data as $barang)
                                <tr>
                                    <td>{{ $barang->kodeBarang }}</td>
                                    <td>{{ $barang->namaBarang }}</td>
                                    <td>{{ $barang->hargaJual }}</td>
                                    <td>{{ $barang->stok }}</td>
                                    <td class="text-center">
                                        <input type="number" class="stock form-control" value="0" min="0" max="{{ $barang->stok }}" style="width: 100px;">
                                    </td>
                                </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h3 class="card-title">Data Belanja Barang</h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table id="example2penjualan2" class="table table-hover" style="overflow: auto; table-layout-fixed;">
                            <thead>
                                <tr>
                                    <th>Barang</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                    <button class="btn btn-primary" id="bayar" style="display: none;" data-toggle="modal" data-target="#bayarModal">Bayar</button>
                </div>
            </div>
        </div>
    </div>
</section>

