@extends('partials')
@section('content')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="mb-2 d-flex justify-content-between">
                        <h1 class="h3 mb-2 text-gray-800">Data transaksi</h1>
                        <button class="btn btn-success add" id="tambah-transaksi">Tambah transaksi</button>
                    </div>

                    <!-- DataTales Example -->
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">NO</th>
                            <th scope="col">kode</th>
                            <th scope="col">nama barang</th>
                            <th scope="col">total</th>
                            <th scope="col">bayar</th>
                            <th scope="col">Kembalian</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                            <tr data-id="{{$transaction->id}}">
                              <th scope="row">1</th>
                              <td>{{$transaction->kode}}</td>
                              <td>{{$transaction->products->nama}}</td>
                              <td>{{$transaction->total}}</td>
                              <td>{{$transaction->bayar}}</td>
                              <td>{{$transaction->kembalian}}</td>
                              <td class="d-flex"><button class="btn btn-warning" onclick="UbahTransaksi({{$transaction->id}})">Ubah</button>
                                <form action="/delete_transaksi/{{$transaction->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger ml-2">Hapus</button>
                                </form>
                            </td>
                            </tr>
                                
                            @endforeach
                        </tbody>
                      </table>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
           
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    
    
    <div class="modal-add-transaksi" id="add-transaksi">
        <div class="modal-add-transaksi-content p-3 rounded">
            <div class="modal-add-transaksi-header d-flex justify-content-between">
                <h1>Tambah transaksi</h1>
                <span id="close-add-transaksi">X</span>
            </div>
            <div class="modal-add-transaksi-body">
                <form action="/store-transaksi" method="POST">
                    @csrf
                    <div class="form-group row">
                      <label for="kode_barang" class="col-4 col-form-label">Kode</label> 
                      <div class="col-8">
                        <input id="kode_barang" name="kode_barang" placeholder="Kode Barang" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="Barang" class="col-4 col-form-label">Nama</label> 
                      <div class="col-8">
                        <select id="Barang" name="barang" class="custom-select">
                            @foreach ($products as $product)
                                <option value="{{$product->id}}">{{$product->nama}}</option>
                            @endforeach
                                
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="total" class="col-4 col-form-label">Total</label> 
                      <div class="col-8">
                        <input id="total" name="total" placeholder="Total harga" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="bayar" class="col-4 col-form-label">Bayar</label> 
                      <div class="col-8">
                        <input id="bayar" name="bayar" placeholder="Bayar " type="text" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="kembalian" class="col-4 col-form-label">Kembalian</label> 
                      <div class="col-8">
                        <input id="kembalian" name="kembalian" placeholder="kembalian" type="text" class="form-control">
                      </div>
                    </div> 
                    <div class="form-group row">
                      <div class="offset-4 col-8">
                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal-ubah-transaksi" id="add-transaksi">
        <div class="modal-ubah-transaksi-content p-3 rounded">
            <div class="modal-ubah-transaksi-header d-flex justify-content-between">
                <h1>Ubah transaksi</h1>
                <span id="close-ubah-transaksi">X</span>
            </div>
            <div class="modal-ubah-transaksi-body">
                <form method="POST" id="form-ubah-transaksi">
                    @csrf
                    @method('patch')
                    <div class="form-group row">
                      <label for="kode_barang" class="col-4 col-form-label">Kode</label> 
                      <div class="col-8">
                        <input id="kode_barang" name="kode_barang" placeholder="Kode Barang" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="Barang" class="col-4 col-form-label">Nama</label> 
                      <div class="col-8">
                        <select id="Barang" name="barang" class="custom-select">
                            @foreach ($products as $product)
                                <option value="{{$product->id}}">{{$product->nama}}</option>
                            @endforeach
                                
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="total" class="col-4 col-form-label">Total</label> 
                      <div class="col-8">
                        <input id="total" name="total" placeholder="Total harga" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="bayar" class="col-4 col-form-label">Bayar</label> 
                      <div class="col-8">
                        <input id="bayar" name="bayar" placeholder="Bayar " type="text" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="kembalian" class="col-4 col-form-label">Kembalian</label> 
                      <div class="col-8">
                        <input id="kembalian" name="kembalian" placeholder="kembalian" type="text" class="form-control">
                      </div>
                    </div> 
                </form>
            </div>
            <div class="modal-ubah-transaksi-footer">
                <div class="form-group row">
                    <div class="offset-4 col-8">
                      <button name="submit" type="submit" class="btn btn-warning" id="save-ubah">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection