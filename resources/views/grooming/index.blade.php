@extends('layouts.app')
@section('title')
    Reservasi Pet Grooming
@endsection

<style>
    .badge {
        display: inline-block;
        padding: 0.25em 0.5em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        border-radius: 0.25rem;
    }

    .badge-danger {
        color: #fff;
        background-color: #dc3545;
    }

    .badge-warning {
        color: #fff;
        background-color: #ffc107;
    }

    .badge-primary {
        color: #fff;
        background-color: #0d6efd;
    }

    .badge-success {
        color: #fff;
        background-color: #28a745;
    }
</style>

@section('content')
    <x-page-title title="Reservasi Pet Grooming" subtitle="Views" />

    <div class="row g-3 d-flex justify-content-between">
        <div class="col-auto">
        </div>
        <div class="col-auto">
            <div class="d-flex align-items-center gap-2 justify-content-lg-end">
            </div>
        </div>
    </div><!--end row-->

    <div class="card mt-4">
        <div class="card-body">
            <div class="product-table">
                <div class="table-responsive white-space-nowrap">
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>                                
                                <th>No</th>
                                <th>Nama</th>
                                <th>Hewan</th>
                                <th>No HP</th>
                                <th>Alamat</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($groomings as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->hewan }}</td>
                                    <td>{{ $item->nohp }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td> <!-- Format the date -->
                                    <td>{{ \Carbon\Carbon::parse($item->waktu)->format('H:i') }}</td> <!-- Format the time -->
                                    <td>
                                        <span class="badge 
                                            {{ $item->status == 'pending' ? 'badge-danger' : ($item->status == 'process' ? 'badge-warning' : ($item->status == 'approved' ? 'badge-primary' : 'badge-success')) }}">
                                            {{ ucfirst($item->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <form action="{{ route('grooming.update-status', $item->id) }}" method="POST">
                                            @csrf
                                            <select name="status" class="form-control" onchange="this.form.submit()">
                                                <option value="pending" {{ $item->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="process" {{ $item->status == 'process' ? 'selected' : '' }}>Process</option>
                                                <option value="approved" {{ $item->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                                <option value="completed" {{ $item->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <!--plugins-->
    <script src="{{ URL::asset('build/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/main.js') }}"></script>
    <script>
        const errorMessages = @json(session('error_messages', []));
        const successMessage = @json(session('success', ''));
    </script>
@endpush