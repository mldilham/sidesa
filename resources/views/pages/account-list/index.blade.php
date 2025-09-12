@extends('layouts.app')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Akun Penduduk</h1>
    </div>
    @if (session('success'))
        <script>
            Swal.fire({
            title: "Berhasil!",
            text: "{{ session()->get('success') }}",
            icon: "success"
        });
        </script>
    @endif
    {{-- Table --}}
    <div class="row">
        <div class="col">
            <div class="card shadow ">
                <div class="card-body">
                    <div style="overflow-x:auto;">
                        <table class="table table-bordered table-hovered w-100">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            @if (count($users) < 1)
                                <tbody>
                                    <tr>
                                        <td colspan="11">
                                            <p class="pt-3 text-center">Tidak Ada Data</p>
                                        </td>
                                    </tr>
                                </tbody>
                            @else
                            <tbody>
                                @foreach ($users as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        @if ($item->status == 'approved')
                                            <span class="badge badge-success">Aktif</span>
                                        @else
                                            <span class="badge badge-danger">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex " style="gap: 10px;">
                                            @if ($item->status == 'approved')
                                                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#confirmationRejected-{{ $item->id }}">
                                                    Non-aktifkan Akun
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#confirmationApprove-{{ $item->id }}">
                                                    Aktifkan Akun
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @include('pages.account-list.confirmation-approve')
                                @include('pages.account-list.confirmation-rejected')
                                @endforeach
                            </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
