@extends('layout.index')

@section('container')
    <h1>Edit</h1>
    <div class="col-md-4 mt-4">
        <form action="/crud/{{ $data->id }}" method="post">
            @csrf
            @method('put')
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama }}"
                        required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="npm" class="col-sm-2 col-form-label">NPM</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="npm" name="npm" value="{{ $data->npm }}"
                        required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}"
                        required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ $data->jurusan }}"
                        required>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-4 float-end">
                    <button class="btn btn-success">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
