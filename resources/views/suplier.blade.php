@extends('partials')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="mb-2 d-flex justify-content-between">
        <h1 class="h3 mb-2 text-gray-800">Data Suplier</h1>
        <button class="btn btn-success add" id="tambah-suplier">Tambah Suplier</button>
    </div>

    <!-- DataTales Example -->
    <table class="table">
        <thead>
          <tr>
            <th scope="col">NO</th>
            <th scope="col">nama</th>
            <th scope="col">Nomor Telepon</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($supliers as $suplier)
          <tr data-id="{{$suplier->id}}">
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$suplier->nama}}</td>
            <td>{{$suplier->nomor_telepon}}</td>
            <td class="d-flex"><button class="btn btn-warning" onclick="Ubahsuplier({{$suplier->id}})">Ubah</button>
              <form action="/delete_suplier/{{$suplier->id}}" method="post">
                  @csrf
                  @method('delete')
                  <button class="btn btn-danger ml-2">Hapus</button></td>
              </form>
          </tr>

          @endforeach
        </tbody>
      </table>

</div>
<div class="modal-add-suplier" id="add-suplier">
    <div class="modal-add-suplier-content p-3 rounded">
        <div class="modal-add-suplier-header d-flex justify-content-between">
            <h1>Tambah Suplier</h1>
            <span id="close-add-suplier">X</span>
        </div>
        <div class="modal-add-suplier-body">
            <form action="/store-suplier" method="post">
              @csrf
                <div class="form-group row">
                  <label for="nama" class="col-4 col-form-label">Nama</label> 
                  <div class="col-8">
                    <input id="nama" name="nama" placeholder="Nama Barang" type="text" class="form-control">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="total" class="col-4 col-form-label">Nomor Telepon</label> 
                  <div class="col-8">
                    <input id="total" name="telepon" placeholder="Nomor Telepon" type="text" class="form-control">
                  </div>
                </div>
                <div class="form-group row">
                    <div class="offset-4 col-8">
                      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-add-suplier-footer">
        </div>
    </div>
</div>


<div class="modal-ubah-suplier" id="add-suplier">
    <div class="modal-ubah-suplier-content p-3 rounded">
        <div class="modal-ubah-suplier-header d-flex justify-content-between">
            <h1>Ubah Suplier</h1>
            <span id="close-ubah-suplier">X</span>
        </div>
        <div class="modal-ubah-suplier-body">
            <form id="form-ubah-suplier" method="POST">
              @csrf
              @method('patch')
                <div class="form-group row">
                    <label for="nama" class="col-4 col-form-label">Nama</label> 
                    <div class="col-8">
                      <input id="nama" name="nama" placeholder="Nama Barang" type="text" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="total" class="col-4 col-form-label">Nomor Telepon</label> 
                    <div class="col-8">
                      <input id="total" name="telepon" placeholder="Total harga" type="text" class="form-control">
                    </div>
                  </div>
            </form>
        </div>
        <div class="modal-ubah-suplier-footer">
            <div class="form-group row">
                <div class="offset-4 col-8">
                  <button name="submit" type="submit" class="btn btn-warning" id="save-ubah">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection