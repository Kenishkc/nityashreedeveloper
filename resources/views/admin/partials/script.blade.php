
@section('script')

<script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('vendor/chart.js/Chart.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('js/demo/chart-area-demo.js')}}"></script>
  <script src="{{ asset('js/demo/chart-pie-demo.js')}}"></script>
   {{-- datatable script --}}
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
  <script>
    $(document).ready( function () {
    
    $('#datatable').DataTable( {
        "scrollX": true
    } );
    
    } );
  </script>

 

