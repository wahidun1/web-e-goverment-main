@extends('layouts.masteradmin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/{{auth()->user()->role}}/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Contoh Surat</li>
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
                            @if (auth()->user()->role=='admin')

                                                        <button type="button" class="btn-sm btn-primary float-right" data-toggle="modal"
                                                            data-target="#modaltambah"><i class="fas fa-plus"></i> Tambah Data</button>

                            @endif
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="datapengumuman" class="table table-bordered table-striped"
                                style="font-size: 14px;width:100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th>Contoh Surat</th>
                                        <th>Nama File</th>
                                        <th style="width: 17%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ( $data as $key=>$datas )
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$datas->namasurat}}</td>
                                        <td>{{$datas->contohsurat}}</td>

                                        <td class="project-actions text-right">
                                            <div>
                                                <a class="btn btn-primary btn-sm"
                                                    href="datasurat/download/{{ $datas->contohsurat }}"
                                                    data-toggle="tooltip" data-placement="top" title="Download">
                                                    <i class="fas fa-download">
                                                    </i>

                                                </a>
                                                @if (auth()->user()->role=='admin')
                                                <a class="btn btn-danger btn-sm delete" href="#" data-toggle="tooltip"
                                                    data-placement="top" title="Hapus" data-id={{ $datas->id }}>
                                                    <i class="fas fa-trash">
                                                    </i>

                                                </a>
                                                @endif


                                            </div>
                                        </td>

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
    <!-- /.content -->


    {{-- ###################################################################################################### --}}


    {{-- Modal Tambah Data --}}
    <div class="modal fade" id="modaltambah">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Guru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/datasurat/tambah" method="POST" id="quickForm" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="surat">Nama Surat</label>
                            <input type="text" class="form-control" id="surat" placeholder="Input Nama Surat"
                                name="surat" required>
                        </div>
                        <div class="form-group">
                            <label>File</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="contohsurat" name="contohsurat"
                                    required>
                                <label class="custom-file-label" for="contohsurat">Choose file</label>
                                <span id="exampleInputEmail1-error" class="error invalid-feedback" style=""></span>
                            </div>
                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- end modal tambah data -->


    {{-- ###################################################################################################### --}}



    {{-- Modal edit Data --}}
    {{-- @foreach ($data as $feb)
    <div class="modal fade" id="editModal-{{$feb->id}}">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Guru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/{{auth()->user()->role}}/guru/{{$feb->id}}/edit" method="POST"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nama_guru">Nama</label>
                        <input name="nama_guru" type="text" class="form-control" id="nama_guru"
                            aria-describedby="emailHelp" placeholder="Nama" value="{{ $feb->nama_guru }}" required>
                    </div>

                    <div class="form-group {{ $errors->has('mapel')?' has-error':'' }}">
                        <label for="mapel">Mapel</label>
                        <select name="mapel_id" class="form-control" id="mapel" required>
                            @foreach ($mapel1 as $row)
                            <option value="{{ $row->id }}" @if($row->id==$feb->mapel_id) selected
                                @endif>{{ $row->mapel_nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" id="jk" required>
                            <option value="Laki-Laki" @if($feb->jenis_kelamin=='Laki-Laki') selected
                                @endif>Laki-Laki</option>
                            <option value="Perempuan" @if($feb->jenis_kelamin=='Perempuan') selected
                                @endif>Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nohp">No HP</label>
                        <input name="tempat_lahir" type="number" value="{{ $feb->no_hp }}" class="form-control"
                            id="nohp" aria-describedby="emailHelp" placeholder="Tempat Lahir" required>
                    </div>
                    <div class="form-group">
                        <label for="tgllhir">Tanggal Lahir</label>
                        <input name="tanggal_lahir" type="date" value="{{ $feb->tanggal_lahir->format('Y-m-d') }}"
                            class="form-control" id="tgllhir" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control" id="password">
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Data</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endforeach --}}
<!-- end modal edit data -->
</div>

@stop

@section('footer')
<script>
    $('.delete').click(function () {
        var data_id = $(this).attr('data-id');

        Swal.fire({
            title: 'Yakin ?',
            text: "Mau Dihapus Data Pegawai dengan id " + data_id + " ??",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/admin/datasurat/" + data_id + "/hapus"
            }
        })
    });
    $(function () {
        $('.select2').select2()
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    })
</script>
@endsection
