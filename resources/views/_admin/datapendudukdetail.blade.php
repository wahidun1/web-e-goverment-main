@extends('layouts.masteradmin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Data Penduduk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/{{auth()->user()->role}}/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Detail Data Penduduk</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <!-- /.content-header -->

    {{-- ###################################################################################################### --}}


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-info btn-sm" onclick="goBack()" data-toggle="tooltip" data-placement="top"
                                title="back">
                                <i class="fas fa-caret-square-left">
                                </i>
                                Back
                            </button>
                            <a class="btn btn-info btn-sm float-right" href="/admin/kartukeluarga/{{ $data->kartukeluarga->id }}/detail" data-toggle="tooltip" data-placement="top"
                                title="Detail">

                                Cek KK
                                <i class="fas fa-caret-square-right">
                                </i>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>NO KK</td>
                                        <td>: {{ $data->kartukeluarga->nokk }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Kepala Keluarga</td>
                                        <td>: {{ $data->kartukeluarga->kepalakeluarga }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>NIK</td>
                                        <td>: {{ $data->nik }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Lengkap</td>
                                        <td>: {{ $data->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tempat, Tanggal Lahir</td>
                                        <td>: {{ $data->tempatlahir }}, {{ $data->tgllahir->format('d/m/Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>: {{ $data->jeniskelamin }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status Kawin</td>
                                        <td>: {{ $data->statuskawin }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>: {{ $data->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Penduduk</td>
                                        <td>: {{ $data->jenispenduduk }}</td>
                                    </tr>
                                    <td>Pekerjaan</td>
                                    <td>: {{ $data->pekerjaan }}</td>
                                    </tr>
                                    </tr>
                                    <td>pendidikan</td>
                                    <td>: {{ $data->pendidikan }}</td>
                                    </tr>
                                    </tr>
                                    <td>Agama</td>
                                    <td>: {{ $data->agama }}</td>
                                    </tr>
                                    </tr>
                                    <td>Lurah/Desa</td>
                                    <td>: {{ $data->lurahdesa }}</td>
                                    </tr>
                                    </tr>
                                    <td>Kecamatan</td>
                                    <td>: {{ $data->kecamatan }}</td>
                                    </tr>
                                    </tr>
                                    <td>Kabupaten</td>
                                    <td>: {{ $data->kabupaten }}</td>
                                    </tr>
                                    </tr>
                                    <td>Provinsi</td>
                                    <td>: {{ $data->provinsi }}</td>
                                    </tr>
                                    </tr>
                                    <td>Negara</td>
                                    <td>: {{ $data->negara }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>


    <!-- end modal edit data -->
</div>

@stop

@section('footer')
<script>
    
    function goBack() {
    window.history.back();
    }
</script>
@endsection
