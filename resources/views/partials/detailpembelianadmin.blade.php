<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h3 class="card-title">Data Detail Supplier</h3>
                            </div>
                            
                            <div class="col-auto">
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                                    Tambah Data
                                </button>
                            </div>
                        </div>
                    </div>
                    

                    <div class="card-body ">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nama Toko</label>
                                    <input type="text" name="namaToko" id="namaToko" class="form-control" placeholder="Nama Toko" value="{{ $data->supplier->namaToko }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Kode Faktur</label>
                                    <input type="text" name="noFaktur" id="noFaktur" class="form-control" placeholder="Kode Faktur" value="{{ $data->noFaktur }}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="date" name="tanggal" id="tanggal" class="form-control" placeholder="Tanggal" value="{{ $data->tanggal }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Total Beli</label>
                                    <input type="number" name="totalHarga" id="totalHarga" class="form-control" placeholder="Total Beli" value="{{ $data->totalHarga }}" readonly>
                                </div>
                            </div>
                        </div>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Toko</th>
                                    <th>Kode Faktur</th>
                                    <th>Total Beli</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no =1;
                                @endphp
                                @foreach ($data as $pembelian)
                                <tr>
                                    <th> {{ $no++ }}</th>
                                    <td>{{ $pembelian->supplier->namaToko }}</td>
                                    <td>{{ $pembelian->noFaktur }}</td>
                                    <td>{{ $pembelian->totalHarga }}</td>
                                    <td>
                                        <a href="/detailpembelian/{{ $pembelian->id }}" class="btn btn-warning"> Detail </a>
                                        <a href="/tampilpembelian/{{ $pembelian->id }}" class="btn btn-info"> Edit </a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$pembelian->id}}">
                                            Hapus
                                        </button>

                                    </td>

                                </tr>

                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Toko</th>
                                    <th>Kode Faktur</th>
                                    <th>Total Beli</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>


            </div>

        </div>

    </div>

</section>