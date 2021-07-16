@extends('layouts.masteradmin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Penduduk Tetap</h1>
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

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tabledata" class="table table-bordered table-striped"
                                style="font-size: 14px;width:100%;">
                                <thead>
                                    <tr>

                                        <th>Nama Lengkap</th>
                                        <th>NIK</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Agama</th>
                                        <th>Pendidikan</th>
                                        <th>Pekerjaan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $data as $datas )
                                    <tr>
                                        <td>{{$datas->nama}}</td>
                                        <td>{{$datas->nik}}</td>
                                        <td>{{$datas->jeniskelamin}}</td>
                                        <td>{{$datas->tempatlahir}}</td>
                                        <td>{{$datas->tgllahir->format('d/m/Y')}}</td>
                                        <td>{{ $datas->agama }}</td>
                                        <td>{{ $datas->pendidikan }}</td>
                                        <td>{{ $datas->pekerjaan }}</td>
                                    </tr>
                                    @endforeach
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

</script>
@endsection
