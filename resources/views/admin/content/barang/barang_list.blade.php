@extends('admin.layout')

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Barang</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="persija-color" href="{{route('home')}}">Home</a></li>
                  <li class="breadcrumb-item active">Barang</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <!-- /.card -->
                @include('admin.template.message')
                <div class="card">
                  <div class="card-header border-0">
                    <h3 class="card-title">Data Barang</h3>
                  </div>
                  <div class="card-body">
                    <table id="example2" class="display">
                        <thead style="text-align: center">
                            <tr>
                                <th></th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>RT</th>
                                <th>Expedisi</th>
                                <th>Qty</th>
                                <th>Tanggal Masuk</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot style="text-align: center">
                            <tr>
                                <th></th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>RT</th>
                                <th>Expedisi</th>
                                <th>Qty</th>
                                <th>Tanggal Masuk</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                  </div>
                    <div class="card-footer">
                        <a href="{{route('barang.create')}}" class="btn btn-danger"><i class="fa fa-edit"></i>&nbsp;Input Barang</a>
                    </div>
                </div>
                <!-- /.card -->
              </div>

            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
      </div>

      <div class="modal fade" id="modal-info">
        <div class="modal-dialog">
          <div class="modal-content bg-info">
            <div class="modal-header">
              <h4 class="modal-title">Ambil Barang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
                <div class="modal-body">
                    <table style="border:none;">
                        <tr>
                            <td><b>Pemilik</b></td>
                            <td>:</td>
                            <td id="pemilik">DSA</td>
                        </tr>
                        <tr>
                            <td><b>Alamat</b></td>
                            <td>:</td>
                            <td id="alamat">DSA</td>
                        </tr>
                        <tr>
                            <td><b>Ekspedisi</b></td>
                            <td>:</td>
                            <td id="ekspedisi">DSA</td>
                        </tr>
                        <tr>
                            <td><b>Total Barang</b></td>
                            <td>:</td>
                            <td id="qty">DSA</td>
                        </tr>
                        <tr>
                            <td><b>Tanggal Masuk</b></td>
                            <td>:</td>
                            <td id="masuk">DSA</td>
                        </tr>
                    </table>
                    <br />
                    {{ Form::open(array('id' => 'form-ambil', 'action' => ['BarangController@ambilBarang', ':id'], 'type' => 'POST')) }}
                        <div class="row">
                            <div class="form-group col-12">
                                <input type="text" name="penerima" class="form-control"
                                placeholder="Masukkan Nama Penerima Barang" requireds>
                            </div>
                            <div class="row">
                                <div class="form-group col-4">
                                    <input type="hidden" name="keluar" class="form-control" value="{{ Auth::user()->name }}">
                                </div>
                            </div>
                        </div>
                        {{ method_field('PATCH') }}
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-light">Ambil Barang</button>
                    </div>
                {{ Form::close() }}
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-sm">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title"><i class="fas fa-trash"></i></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Apakah anda yakin ingin menghapus data ini?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-ban"></i></button>


                {{ Form::open(array("id" => "form-delete", "action" => ["BarangController@destroy",':id'])) }}
                    @method('DELETE')
                    <button type="submit" class="btn btn-default"><i class="fas fa-check"></i></button>
                {{ Form::close() }}
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<style>
    td.details-control {
        background: url('assets/img/details_open.png') no-repeat center center;
        cursor: pointer;
    }
    tr.details td.details-control {
        background: url('assets/img/details_close.png') no-repeat center center;
    }
</style>
@endsection

@section('js')
<script src="{{asset('assets/js/demo.js')}}"></script>
<script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>

<script>
function format ( d ) {
    var text = '<b>Penanggung Jawab Barang Masuk</b>: '+d.pj_masuk;

    if(d.tanggal_keluar !== null){
        text += '<br><b>Tanggal Keluar</b>: '+moment(d.tanggal_keluar).format('Do MMMM YYYY - HH:mm:ss') + '<br><b>Penerima</b>: '+d.penerima;
    }

    if(d.pj_keluar.trim() !== ""){
        text += '<br><b>Penanggung Jawab Barang Keluar</b>: '+d.pj_keluar;
        console.log(d.pj_keluar !== null);
    }

    return text;
}

$(function () {
    var dt = $('#example2').DataTable({
        "lengthMenu": [[5, 10, 25], [5, 10, 25]],
        "processing": true,
        "serverSide": true,
        "ajax": "barang/all",
        "columnDefs" : [
            {"className": "dt-center", "targets": "_all"},
            {"targets":6, "render": function(data){
                return moment(data).format('Do MMMM YYYY');
            }}
        ],
        "columns": [{
            "class":          "details-control",
            "orderable":      false,
            "data":           null,
            "defaultContent": ""
        },
        { "data": "pemilik" },
        { "data": "no_rumah" },
        { "data": "no_rt" },
        {
            "data": "ekspedisi",
            "render" : function(data,type,row){
                console.log (data.replace('&amp;', '&'))
                return data.replace('&amp;', '&');
            }
        },
        { "data": "qty" },
        { "data": "tanggal_masuk" },
        {
            sortable:true,
            "data": "status",
            "render" : function(data,type,row){
                console.log(data)
                if(data === "" || data === null || data === "Diterima"){
                    return "<p style='color:red'>Barang Belum Diambil</p>";
                } else {
                    return "<p style='color:green'>Barang Sudah Diambil</p>";
                }
            }
        },
        {
            sortable: false,
            "render": function ( data, type, full, meta ) {
                var buttonID = "rollover_"+full.id;

                var url = '{{route("barang.update", ["barang" => ":id"])}}';
                url = url.replace(':id', full.id);

                var text = '<a class="btn-sm btn-success" style="margin:3px;" href="'+url+'"><i class="fas fa-edit"></i></a>'+
                    '<button class="btn-sm btn-danger" style="margin:3px;" type="button" data-id="'+full.id+'" data-toggle="modal" data-target="#modal-sm"><i class="fas fa-trash"></i></button>';

                if(full.status === "Diterima"){
                    text += '<button type="button" style="margin:3px;" class="btn-sm btn-info" data-id="'+full.id+'" data-pemilik="'+full.pemilik+'" data-alamat="'+full.no_rumah+' RT'+full.no_rt+'" data-ekspedisi="'+full.ekspedisi+'"'+
                    ' data-qty="'+full.qty+'" data-masuk="'+full.tanggal_masuk+'" data-toggle="modal" data-target="#modal-info"><i class="fas fa-check"></i></button>';
                }

                return text;
            }
        }
        ],
        "order": [[1, 'asc']]
    });

    // Array to track the ids of the details displayed rows
    var detailRows = [];

    $('#example2 tbody').on( 'click', 'tr td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = dt.row( tr );
        var idx = $.inArray( tr.attr('id'), detailRows );

        if ( row.child.isShown() ) {
            tr.removeClass( 'details' );
            row.child.hide();

            // Remove from the 'open' array
            detailRows.splice( idx, 1 );
        }
        else {
            tr.addClass( 'details' );
            row.child( format( row.data() ) ).show();

            // Add to the 'open' array
            if ( idx === -1 ) {
                detailRows.push( tr.attr('id') );
            }
        }
    } );


    // On each draw, loop over the `detailRows` array and show any child rows
    dt.on( 'draw', function () {
        $.each( detailRows, function ( i, id ) {
            $('#'+id+' td.details-control').trigger( 'click' );
        } );
    } );

    var oldIdAmbil = ":id";
    var oldIdDelete = ":id";

    $('#modal-info').on('show.bs.modal', function(event){
        var btn = $(event.relatedTarget)

        var pemilik = btn.data('pemilik')
        var alamat = btn.data('alamat')
        var ekspedisi = btn.data('ekspedisi')
        var qty = btn.data('qty')
        var masuk = btn.data('masuk')
        var id = btn.data('id')

        var modal = $(this)

        modal.find('.modal-body #pemilik').html(pemilik)
        modal.find('.modal-body #alamat').html(alamat)
        modal.find('.modal-body #ekspedisi').html(ekspedisi)
        modal.find('.modal-body #qty').html(qty)
        modal.find('.modal-body #masuk').html(masuk)
        modal.find('.modal-body #form-ambil').attr('action', function (i,old) {
            console.log(id)

            var oldUri = old.replace(oldIdAmbil, id);
            oldIdAmbil = id;
            return oldUri;
        });
    });

    $('#modal-sm').on('show.bs.modal', function(event){
        var btn = $(event.relatedTarget)

        var id = btn.data('id')

        var modal = $(this)

        console.log(id)

        modal.find('.modal-footer #form-delete').attr('action', function (i,old) {
            console.log(id)

            var oldUri = old.replace(oldIdDelete, id);
            oldIdDelete = id;
            return oldUri;
        });
    });
});
</script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
@endsection
