@extends('layouts.app')

@section('title', 'User Management')

@section('content')
<div class="container my-4">
    <h3 class="mb-4">Manajemen Pengguna</h3>

    <!-- Tombol Tambah Pengguna -->
    <a href="{{ route('users.create') }}" class="btn btn-success mb-3">
        <i class="fa fa-plus-circle"></i> Tambah Pengguna
    </a>

    <!-- Pencarian Pengguna -->
    <form action="{{ route('users.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari Pengguna" value="{{ request()->get('search') }}">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </form>

    <!-- Tabel Daftar Pengguna -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst($user->role) }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash-alt"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $users->links() }}
</div>
@endsection
