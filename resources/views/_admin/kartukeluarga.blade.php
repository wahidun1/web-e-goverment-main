@extends('layouts.masteradmin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Kartu Keluarga</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/{{auth()->user()->role}}/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Data Kartu Keluarga</li>
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

                            <button type="button" class="btn-sm btn-primary float-right" data-toggle="modal"
                                data-target="#modaltambah"><i class="fas fa-plus"></i> Tambah Data</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="tabledata" class="table table-bordered table-striped"
                                style="font-size: 14px;width:100%;">
                                <thead>
                                    <tr>

                                        <th>No KK</th>
                                        <th>Kepala Keluarga</th>


                                        <th style="width: 17%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ( $data as $datas )
                                    <tr>

                                        <td>{{$datas->nokk}}</td>
                                        <td>{{$datas->kepalakeluarga}}</td>

                                        <td class="project-actions text-right">
                                            <div>
                                                <a class="btn btn-info btn-sm"
                                                    href="/admin/kartukeluarga/{{ $datas->id }}/detail"
                                                    data-toggle="tooltip" data-placement="top" title="Detail">
                                                    <i class="fas fa-user">
                                                    </i>

                                                </a>
                                                <a class="btn btn-primary btn-sm" href="#"
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
                    <h4 class="modal-title">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/kartukeluarga/tambah" method="POST" id="formkk"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="form-group">
                                <label for="nokk">NO KK *</label>
                                <input type="number" class="form-control" id="nokk" placeholder="Input NO KK"
                                    name="nokk" required>
                                    @if($errors->has('nokk'))
                                        <span class="help-block">{{ $errors->first('nokk') }}</span>
                                    @endif
                            </div>
                            <div class="form-group">
                                <label for="kepalakeluarga">Nama Kepala Keluarga *</label>
                                <input type="text" class="form-control" id="kepalakeluarga"
                                    placeholder="Input Nama Kepala Keluarga" name="kepalakeluarga" required>
                                    @if($errors->has('kepalakeluarga'))
                                        <span class="help-block">{{ $errors->first('kepalakeluarga') }}</span>
                                    @endif
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary simpan">Simpan</button>
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
                <h4 class="modal-title">Edit Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/kartukeluarga/{{$feb->id}}/edit" method="POST"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nokk">No KK</label>
                        <input name="nokk" type="text" class="form-control" id="nokk"
                            aria-describedby="emailHelp" placeholder="Nomor KK" value="{{ $feb->nokk }}" required>
                    </div>
                    <div class="form-group">
                        <label for="kepalakeluarga">Nama Kepala Keluarga</label>
                        <input name="kepalakeluarga" type="text" class="form-control" id="kepalakeluarga"
                            aria-describedby="emailHelp" placeholder="Kepala Keluarga" value="{{ $feb->kepalakeluarga }}" required>
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
                window.location = "/admin/kartukeluarga/" + data_id + "/hapus"

            }
        })
    });

    $(function () {
    $('#formkk').validate({
        rules: {
            nokk: {

                rangelength: [5, 20],
                required: true,

            },
        },

        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
});
</script>
@endsection
