<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h3 class="card-title">Data Belanja Supplier</h3>
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