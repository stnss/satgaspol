@extends('admin.layout')

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Rekapitulasi</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="persija-color" href="{{route('home')}}">Home</a></li>
                  <li class="breadcrumb-item active">Rekapitulasi</li>
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
                <div class="card">
                  <div class="card-header border-0">
                  <h3 class="card-title">Data Barang RT {{$data['rt']}}</h3>
                  </div>
                  <div class="card-body">
                    <table id="example2" class="display">
                        <thead style="text-align: center">
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Expedisi</th>
                                <th>Qty</th>
                                <th>Tanggal Masuk</th>
                            </tr>
                        </thead>
                        <tbody style="text-align:center">
                            @php
                                $index = 1;
                            @endphp
                            @if(key_exists("records", $data))
                                @foreach ($data['records'] as $item)
                                    <tr>
                                        <td>{{$index}}</td>
                                        <td>{{$item['pemilik']}}</td>
                                        <td>{{$item['no_rumah']}}</td>
                                        <td>{{htmlspecialchars_decode ($item['ekspedisi'])}}</td>
                                        <td>{{$item['qty']}}</td>
                                        @php
                                            $old_date_timestamp = strtotime($item['tanggal_masuk']);
                                        @endphp
                                        <td>{{date('l, d M Y', $old_date_timestamp)}}</td>
                                    </tr>
                                    @php
                                        $index++;
                                    @endphp
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot style="text-align: center">
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Expedisi</th>
                                <th>Qty</th>
                                <th>Tanggal Masuk</th>
                            </tr>
                        </tfoot>
                    </table>
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
$(function () {
    var dt = $('#example2').DataTable({
        "lengthMenu": [[10, -1], [10, "Semua"]],
        "paging": true,
        "ordering": true,
        "info": true,
        "autoWidth": false
    });
});
</script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
@endsection
