@extends('layout.main')
@section('title', 'SMK WIKRAMA 1 GARUT')

@section('content')

<div class="row">
        <div class="col-md-12 mt-3">
            <div class="container-fluid">

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Documen Peserta</h6>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>NISN</th>
                                        <th>KARTU KELUARGA</th>
                                        <th>AKTE</th>
                                        <th>SKHUN</th>
                                        <th>IJAZAH</th>
                                        <th>STATUS</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center">
                                        @if ($document != null)
                                            <td>{{$document->nisn}}</td>
                                            <td><img src="{{asset('image/'. $document->kk)}}"width="80" height="80"></td>
                                            <td><img src="http://localhost:8000/image/{{$document->akte}}" width="80" height="80"></td>
                                            <td><img src="http://localhost:8000/image/{{$document->skhun}}" width="80" height="80"></td>
                                            <td><img src="http://localhost:8000/image/{{$document->ijazah}}" width="80" height="80"></td>
                                            <td>
                                                @if($user->status == 'diterima')
                                                    <span class="badge badge-pill badge-primary">
                                                        Selamat Anda Diterima di SMK WIKRAMA 1 GARUT
                                                    </span>
                                                    @elseif ($user->status == 'ditolak')
                                                    <span class="badge badge-pill badge-danger">
                                                        Maaf Anda Ditolak di SMK WIKRAMA 1 GARUT
                                                    </span>
                                                    @else
                                                        Tunggu Konfirmasi !
                                                    @endif
                                            </td>
                                            <td>
                                                <a href="/user/edit/{{$document->id}}" class="btn btn-warning">Edit</a>
                                                <a href="/user/informasi/{{$document->id}}" class="btn btn-primary">informasi</a>
                                                <form action="/user/delete/{{$document->id}}" method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger ">Hapus</button>
                                                </form>
                                            </td>
                                        @else
                                            <td colspan="7">
                                                {{"Data Kosong"}}
                                            </td>

                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>

@endsection
