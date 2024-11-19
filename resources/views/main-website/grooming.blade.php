@extends('layouts.main-layout')
@section('title', 'Pet Grooming')
@section('content')
<section class="breadcrumb-area" style="background-image: url({{ URL::asset('main-website/images/slides/salshi.jpg') }});">
    <div class="banner-curve"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content text-center">
                    <div class="title wow slideInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                        <h2>Pet Grooming<span class="dotted"></span></h2>
                    </div>
                    <div class="breadcrumb-menu wow slideInDown" data-wow-delay="0.3s" data-wow-duration="1500ms">
                        <ul class="clearfix">
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Pet Grooming</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="grooming-area" class="grooming-style3-area">
    <div class="container">
        <!-- Tombol Tambah Reservasi -->
        <div class="row mb-3">
            <div class="col-md-12 text-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#addReservationModal">Tambah Reservasi</button>
            </div>
        </div>

        <!-- Tabel Data Grooming -->
        <div class="row">
            <div class="col-md-12">
            <h3>Data Reservasi</h3>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Hewan</th>
                            <th>No HP</th>
                            <th>Alamat</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($groomings as $grooming)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $grooming->hewan }}</td>
                                <td>{{ $grooming->nohp }}</td>
                                <td>{{ $grooming->alamat }}</td>
                                <td>{{ $grooming->tanggal }}</td>
                                <td>{{ $grooming->waktu }}</td>
                                <td>
                                    <span class="badge 
                                        {{ $grooming->status == 'pending' ? 'badge-danger' : 
                                        ($grooming->status == 'process' ? 'badge-warning' : 
                                        ($grooming->status == 'approved' ? 'badge-primary' : 'badge-success')) }}">
                                        {{ ucfirst($grooming->status) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Belum ada data reservasi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <p class="mt-3 text-muted">
                    *Apabila status masih <strong>Pending</strong> dalam waktu 3x24 jam, silakan hubungi kami melalui WhatsApp di nomor <strong>0852-1262-2615</strong>.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Modal Tambah Reservasi -->
<div class="modal fade" id="addReservationModal" tabindex="-1" role="dialog" aria-labelledby="addReservationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('grooming.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addReservationModalLabel">Tambah Reservasi Grooming</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="hewan">Hewan</label>
                        <input type="text" class="form-control" id="hewan" name="hewan" required>
                    </div>
                    <div class="form-group">
                        <label for="nohp">No HP</label>
                        <input type="text" class="form-control" id="nohp" name="nohp" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="waktu">Waktu</label>
                        <input type="time" class="form-control" id="waktu" name="waktu" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
