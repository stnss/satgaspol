<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <strong>Posko Barang Satgaspol Covid-19 2019 - @php echo Date("Y") @endphp</strong>
        <div class="float-right d-none d-sm-inline-block">
          <b>Wayne Studio</b>
        </div>
      </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- Bootstrap -->
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE -->
    <script src="{{asset('assets/js/adminlte.js')}}"></script>

    <!-- OPTIONAL SCRIPTS -->
    @yield('js')

  </body>
</html>
