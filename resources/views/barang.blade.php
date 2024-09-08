@extends('partials')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="mb-2 d-flex justify-content-between">
        <h1 class="h3 mb-2 text-gray-800">Data Barang</h1>
        <button class="btn btn-success add" id="tambah-barang">Tambah Barang</button>
    </div>

    <!-- DataTales Example -->
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Satuan</th>
            <th scope="col">Harga</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $product)
            <tr data-id="{{$product->id}}">
              <th scope="row">{{$loop->iteration}}</th>
              <td>{{$product->nama}}</td>
              <td>{{$product->jumlah}}</td>
              <td>{{$product->satuan}}</td>
              <td>{{$product->harga}}</td>
              <td class="d-flex">
                <button class="btn btn-warning" onclick="UbahBarang({{$product->id}})">Ubah</button>
                <form action="/delete_barang/{{$product->id}}" method="post">
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
<div class="modal-add-barang" id="add-barang">
  <div class="modal-add-barang-content p-3 rounded">
      <div class="modal-add-barang-header d-flex justify-content-between">
          <h1>Tambah barang</h1>
          <span id="close-add-barang">X</span>
      </div>
      <div class="modal-add-barang-body">
          <form method="POST" action="/store-barang">
            @csrf
              <div class="form-group row">
                <label for="nama" class="col-4 col-form-label">Nama</label> 
                <div class="col-8">
                  <input id="nama" name="nama_barang" placeholder="Nama Barang" type="text" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label for="jumlah" class="col-4 col-form-label">Jumlah</label> 
                <div class="col-8">
                  <input id="jumlah" name="jumlah" placeholder="Jumlah Barang" type="text" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label for="satuan" class="col-4 col-form-label">Satuan</label> 
                <div class="col-8">
                  <input id="satuan" name="satuan" placeholder="Satuan harga" type="text" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label for="harga" class="col-4 col-form-label">Harga</label> 
                <div class="col-8">
                  <input id="harga" name="harga" placeholder="Harga satuan" type="text" class="form-control">
                </div>
              </div> 
              <div class="form-group row">
                  <div class="offset-4 col-8">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                  </div>
              </div>
          </form>
      </div>
      <div class="modal-add-barang-footer">
      </div>
  </div>
</div>
<div class="modal-ubah-barang" id="add-barang">
  <div class="modal-ubah-barang-content p-3 rounded">
      <div class="modal-ubah-barang-header d-flex justify-content-between">
          <h1>Ubah barang</h1>
          <span id="close-ubah-barang">X</span>
      </div>
      <div class="modal-ubah-barang-body">
          <form id="form-ubah-barang" method="POST">
            @method('patch')
            @csrf
              <div class="form-group row">
                <label for="nama" class="col-4 col-form-label">Nama</label> 
                <div class="col-8">
                  <input id="nama" name="nama" placeholder="Nama Barang" type="text" class="form-control" >
                </div>
              </div>
              <div class="form-group row">
                <label for="jumlah" class="col-4 col-form-label">Jumlah</label> 
                <div class="col-8">
                  <input id="jumlah" name="jumlah" placeholder="Jumlah Barang" type="text" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label for="satuan" class="col-4 col-form-label">Satuan</label> 
                <div class="col-8">
                  <input id="satuan" name="satuan" placeholder="Satuan harga" type="text" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label for="harga" class="col-4 col-form-label">Harga</label> 
                <div class="col-8">
                  <input id="harga" name="harga" placeholder="Harga satuan" type="text" class="form-control">
                </div>
              </div> 
          </form>
      </div>
      <div class="modal-ubah-barang-footer">
          <div class="form-group row">
              <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-warning" id="save-ubah">Submit</button>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection