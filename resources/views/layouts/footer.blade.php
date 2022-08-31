  <!-- Main Footer -->
  <footer class="main-footer">
      <strong>Copyright &copy; 2022 <a href="/">SIIOM</a>.</strong>
      All rights reserved. <a href="https://www.instagram.com/akhmad.indra/" class="mr-2"><small>By Indra</small></a><a href="https://www.instagram.com/z.bidah/"><small>Bidah</small></a>
      <div class="float-right d-none d-sm-inline-block">

      </div>
  </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="{{ asset('') }}asset/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('') }}asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('') }}asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('') }}asset/dist/js/adminlte.js"></script>

  <!-- PAGE {{ asset('') }}asset/plugins -->
  <!-- jQuery Mapael -->
  <script src="{{ asset('') }}asset/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="{{ asset('') }}asset/plugins/raphael/raphael.min.js"></script>
  <script src="{{ asset('') }}asset/plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="{{ asset('') }}asset/plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- ChartJS -->
  <script src="{{ asset('') }}asset/plugins/chart.js/Chart.min.js"></script>

  <!-- AdminLTE for demo purposes -->
  {{-- <script src="{{ asset('') }}asset/dist/js/demo.js"></script> --}}
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset('') }}asset/dist/js/pages/dashboard2.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
      integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
      integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
  </script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>

  <script src="{{ asset('') }}asset/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ asset('') }}asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{ asset('') }}asset/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="{{ asset('') }}asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="{{ asset('') }}asset/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="{{ asset('') }}asset/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="{{ asset('') }}asset/plugins/jszip/jszip.min.js"></script>
  <script src="{{ asset('') }}asset/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="{{ asset('') }}asset/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="{{ asset('') }}asset/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="{{ asset('') }}asset/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="{{ asset('') }}asset/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script src="{{ asset('') }}asset/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
  <script>
    $("input[data-bootstrap-switch]").each(function(){
  $(this).bootstrapSwitch('state', $(this).prop('checked'));
})
</script>
  <script>
    
      $(function() {
          $("#tampil1").DataTable({
              "responsive": true,
              "lengthChange": true,
              "autoWidth": true,
              "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#tampil1_wrapper .col-md-6:eq(0)');
          $("#printb").DataTable({
              "responsive": true,
              "lengthChange": true,
              "autoWidth": true,
              "buttons": [{
                extend : 'copy',
                exportOptions: {
                    columns : [0, 1, 2, 3, 4]
                }
            },
            {
                extend : 'pdf',
                exportOptions: {
                    columns : [0, 1, 2, 3, 4]
                }
            },
            {
                extend : 'excel',
                exportOptions: {
                    columns : [0, 1, 2, 3, 4]
                }
            },
            {
                extend : 'print',
                exportOptions: {
                    columns : [0, 1, 2, 3, 4]
                }
            }
        ]
          }).buttons().container().appendTo('#printb_wrapper .col-md-6:eq(0)');
          $("#printp").DataTable({
              "responsive": true,
              "lengthChange": true,
              "autoWidth": true,
              "buttons": [{
                extend : 'copy',
                exportOptions: {
                    columns : [0, 1, 2, 3, 4,5]
                }
            },
            {
                extend : 'pdf',
                exportOptions: {
                    columns : [0, 1, 2, 3, 4,5]
                }
            },
            {
                extend : 'excel',
                exportOptions: {
                    columns : [0, 1, 2, 3, 4,5]
                }
            },
            {
                extend : 'print',
                exportOptions: {
                    columns : [0, 1, 2, 3, 4,5]
                }
            }
        ]
          }).buttons().container().appendTo('#printp_wrapper .col-md-6:eq(0)');
          $("#printk").DataTable({
              "responsive": true,
              "lengthChange": true,
              "autoWidth": true,
              "buttons": [{
                extend : 'copy',
                exportOptions: {
                    columns : [0, 1, 2, 3, 4,5,6,7]
                }
            },
            {
                extend : 'pdf',
                exportOptions: {
                    columns : [0, 1, 2, 3, 4,5,6,7]
                }
            },
            {
                extend : 'excel',
                exportOptions: {
                    columns : [0, 1, 2, 3, 4,5,6,7]
                }
            },
            {
                extend : 'print',
                exportOptions: {
                    columns : [0, 1, 2, 3, 4,5,6,7]
                }
            }
        ]
          }).buttons().container().appendTo('#printk_wrapper .col-md-6:eq(0)');
          $('#tampil2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": true,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
          });
          $('#dataMany').DataTable({
              "paging": true,
              "lengthChange": true,
              "searching": true,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
          });
      });
  </script>
