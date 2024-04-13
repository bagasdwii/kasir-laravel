<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h3 class="card-title">Data Detail retur</h3>
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
                                    <label>Nama Barang</label>
                                    <input type="text" name="namaBarang" id="namaBarang" class="form-control" placeholder="Nama Barang" value="{{ $data1->barang->namaBarang }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Kode Faktur</label>
                                    <input type="text" name="noFaktur" id="noFaktur" class="form-control" placeholder="Kode Faktur" value="{{ $data1->pembelian->noFaktur }}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                         
                                <div class="form-group">
                                    <label>Jumlah</label>
                                    <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Jumlah" value="{{ $data1->jumlah }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Kembali</label>
                                    <input type="number" name="kembali" id="kembali" class="form-control" placeholder="Kembali" value="{{ $data1->kembali }}" readonly>
                                </div>
                            </div>
                        </div>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah Kembali</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no =1;
                                @endphp
                                @foreach ($data as $detailretur)
                                <tr>
                                    <th> {{ $no++ }}</th>
                                    <td>{{ $detailretur->tanggal }}</td>
                                    <td>{{ $detailretur->kembali }}</td>
                                    <td>
                                        
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$detailretur->id}}">
                                            Hapus
                                        </button>

                                    </td>

                                </tr>

                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah Kembali</th>
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