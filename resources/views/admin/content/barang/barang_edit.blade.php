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
                  <li class="breadcrumb-item"><a class="persija-color" href="{{route('barang.index')}}">Barang</a></li>
                  <li class="breadcrumb-item active">Edit Barang</li>
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
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
              <div class="col-lg-12">
                <!-- /.card -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Input Barang</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    {{ Form::open(array('action' => ['BarangController@update', $data->id], 'method' => 'POST')) }}
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="inputKriteria">Nama Pemilik</label>
                                    <input type="text" name="pemilik" class="form-control" value="{{$data->pemilik}}" placeholder="Masukan Pemilik Barang">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="inputKriteria">No Rumah</label>
                                    <input type="text" name="no_rumah" id="rumah" class="form-control" value="{{$data->no_rumah}}" placeholder="Nomor Rumah ex. D2/59">
                                </div>
                                <div class="form-group col-6">
                                    <label>RT</label>
                                    <input type="text" name="no_rt" id="rt" class="form-control" value="{{$data->no_rt}}" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="inputKriteria">Qty</label>
                                    <input type="number" name="qty" class="form-control" min="1" value="{{$data->qty}}" placeholder="Masukan Jumlah Barang">
                                </div>
                                <div class="form-group col-6">
                                    <label>Ekspedisi</label>
                                    <input type="text" name="ekspedisi" class="form-control" value="{{$data->ekspedisi}}" placeholder="Masukan Ekspedisi">
                                </div>
                            </div>
                        </div>
                        {{ method_field('PATCH') }}
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-danger"><i class="fas fa-edit"></i>&nbsp;Edit Barang</button>
                        </div>
                    {{ Form::close() }}
                </div>
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
@endsection

@section('js')
    <script src="{{asset('assets/js/demo.js')}}"></script>

<script>
$(function () {
    $('#rumah').on('keyup', function(){
        var no_rumah = $('#rumah').val();

        var data = {"no_rumah" : no_rumah};

        console.log(data)
        $.get("http://dubin.tintamerdeka.co.id/api_dubin/processor/admin/findRtByBlok.php?blok=" + no_rumah, function(data, status){
            console.log(data.rt[0].no_rt)
            $('#rt').val(data.rt[0].no_rt)
        });
    });
});
</script>
@endsection
