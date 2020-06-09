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
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
              <div class="col-lg-8">
                <!-- /.card -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Rekapitulasi</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    {{ Form::open(array('action' => 'RekapController@store')) }}
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-8">
                                    <label>Pilih RT</label>
                                    <select name="no_rt" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                        @php
                                            for($i = 1; $i <= 14; $i++){
                                                echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                        @endphp
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-danger"><i class="fas fa-edit"></i>&nbsp;Lihat Data</button>
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
    $('[data-mask]').inputmask()
});
</script>
@endsection
