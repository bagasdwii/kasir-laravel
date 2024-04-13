<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h3 class="card-title">Data Retur</h3>
                            </div>
                            
                            <div class="col-auto">
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                                    Tambah Data
                                </button>
                            </div>
                        </div>
                    </div>
                    

                    <div class="card-body ">
                        
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Faktur</th>
                                    <th>Nama Barang</th>

                                    <th>Jumlah</th>
                                    <th>Kembali</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no =1;
                                @endphp
                                @foreach ($data as $retur)
                                <tr>
                                    <th> {{ $no++ }}</th>
                                    <td>{{ $retur->pembelian->noFaktur }}</td>
                                    <td>{{ $retur->barang->namaBarang }}</td>
    
                                    <td>{{ $retur->jumlah }}</td>
                                    <td>{{ $retur->kembali }}</td>
                                    <td>{{ $retur->keterangan }}</td>
                                   
                                    <td>
                                        <a href="/detailretur/{{ $retur->id }}" class="btn btn-warning"> Detail </a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$retur->id}}">
                                            Hapus
                                        </button>

                                    </td>

                                </tr>

                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>No Faktur</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Kembali</th>
                                    <th>Keterangan</th>
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