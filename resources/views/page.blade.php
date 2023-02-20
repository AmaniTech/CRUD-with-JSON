@extends('layout.index')

@section('container')
    <h1>Data dari file JSON</h1>

    {{-- ---------------- --}}
    @if (session('status'))
        <div class="container">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    {{-- ---------------- --}}

    {{-- button input --}}
    <div class="row mt-4">
        <div class="col-md-4">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Create</button>
        </div>
    </div>
    {{-- end button input --}}
    <table class="table table-striped table-bordered mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Nama</th>
                <th>NPM</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d['id'] }}</td>
                    <td>{{ $d['nama'] }}</td>
                    <td>{{ $d['npm'] }}</td>
                    <td>{{ $d['email'] }}</td>
                    <td>{{ $d['jurusan'] }}</td>
                    <td>
                        <form action="/crud/{{ $d['id'] }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Delete</button>
                        </form>

                        <form action="/crud/{{ $d['id'] }}/edit" class="d-inline">
                            @csrf
                            <button class="btn btn-warning">Edit</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form method="post" action="/crud">
                        @csrf
                        <div class="mb-3">
                            <label for="id" class="form-label">Id</label>
                            <input type="text" class="form-control" id="id" name="id"
                                value="{{ $r_number }}">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="npm" class="form-label">NPM</label>
                            <input type="text" class="form-control" id="npm" name="npm">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <input type="text" class="form-control" id="jurusan" name="jurusan">
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>

                    </form>
                </div>

            </div>
        </div>
    </div>
    {{-- end modal --}}
@endsection
