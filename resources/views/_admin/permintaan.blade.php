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
                        <li class="breadcrumb-item active">Data Pengaduan</li>
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
                            <div class="card-title">

                                Data Permintaan
                            </div>
                            @if(auth()->user()->role=='user')
                            <button type="button" class="btn-sm btn-primary float-right" data-toggle="modal"
                                data-target="#modaltambah"><i class="fas fa-plus"></i> Tambah Data</button>
                            @endif
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="datapengumuman" class="table table-bordered table-striped"
                                style="font-size: 14px;width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th>Author</th>
                                        <th>Deskripsi</th>
                                        <th>Status</th>
                                        <th>File</th>
                                        <th>Dibuat</th>


                                        <th style="width: 17%">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ( $data as $key=>$datas )
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$datas->author}}</td>
                                        <td>{{$datas->deskripsi}}</td>
                                        <td>@if($datas->status=='Process')
                                            <span class="right badge badge-danger">{{ $datas->status }}</span>
                                            @elseif($datas->status=='Selesai')
                                            <span class="right badge badge-primary">{{ $datas->status }}</span>
                                            @endif
                                        </td>
                                        <td>{{$datas->filesurat}}</td>
                                        <td>{{$datas->created_at->format('d/m/Y')}}</td>
                                        @if (auth()->user()->role=='admin')
                                        <td class="project-actions text-right">
                                            <div>
                                                <a class="btn btn-primary btn-sm"
                                                    href="datapermintaan/download/{{ $datas->filesurat }}"
                                                    data-toggle="tooltip" data-placement="top" title="Download">
                                                    <i class="fas fa-download">
                                                    </i>

                                                </a>
                                                <a class="btn btn-warning btn-sm" href="#"
                                                    data-target="#editModal-{{$datas->id}}" data-toggle="modal"
                                                    data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>

                                                </a>
                                                <a class="btn btn-danger btn-sm delete" href="#" data-toggle="tooltip"
                                                    data-placement="top" title="Hapus" data-id={{ $datas->id }}>
                                                    <i class="fas fa-trash">
                                                    </i>

                                                </a>

                                            </div>
                                        </td>
                                        @elseif(auth()->user()->role=='user')
                                        <td class="project-actions text-right">
                                            <div>
                                                <a class="btn btn-primary btn-sm"
                                                    href="datapermintaan/download/{{ $datas->filesurat }}"
                                                    data-toggle="tooltip" data-placement="top" title="Download">
                                                    <i class="fas fa-download">
                                                    </i>
                                                </a>
                                                {{-- <a class="btn btn-danger btn-sm delete" href="#" data-toggle="tooltip"
                                                    data-placement="top" title="Hapus" data-id={{ $datas->id }}>
                                                    <i class="fas fa-trash">
                                                    </i>

                                                </a> --}}
                                            </div>

                                        </td>
                                        @endif


                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            <span class="right "> <b><i>* Apabila status telah selesai silahkan ambil hasil document di kantor desa</i></b></span>


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
                    <h4 class="modal-title">Tambah Permintaan Surat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/user/datapermintaan/tambah" method="POST" id="quickForm"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nama">Nama Surat</label>
                            <input type="text" class="form-control" id="nama" placeholder="Input Nama Surat"
                                name="deskripsi" required>
                        </div>
                        <div class="form-group">
                            <label>File Surat</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="filesurat" name="filesurat" required>
                                <label class="custom-file-label" for="filesurat">Choose file</label>
                                <span id="exampleInputEmail1-error" class="error invalid-feedback" style=""></span>
                            </div>
                        </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
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
    @foreach ($data as $feb)
    <div class="modal fade" id="editModal-{{$feb->id}}">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Permintaan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/datapermintaan/{{$feb->id}}/edit" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input name="author" type="text" class="form-control" id="author"
                                aria-describedby="emailHelp" placeholder="Author" value="{{ $feb->author }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input name="deskripsi" type="text" class="form-control" id="deskripsi"
                                aria-describedby="emailHelp" placeholder="Deskripsi" value="{{ $feb->deskripsi }}">
                        </div>

                        <div class="form-group {{ $errors->has('status')?' has-error':'' }}">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" id="status" required>
                                <option value="Process" @if($feb->status=='Process') selected @endif>Process</option>
                                <option value="Selesai" @if($feb->status=='Selesai') selected @endif>Selesai</option>
                            </select>
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
    @endforeach
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
                window.location = "/admin/datapermintaan/" + data_id + "/hapus"
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
