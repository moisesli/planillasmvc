<!-- jQuery -->
<script src="../libreria/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../libreria/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="../libreria/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../libreria/plugins/chart.js/Chart.min.js"></script>
<script src="../libreria/plugins/sparklines/sparkline.js"></script>
<script src="../libreria/plugins/datatables/jquery.dataTables.js"></script>
<script src="../libreria/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../libreria/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="../libreria/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="../libreria/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="../libreria/plugins/moment/moment.min.js"></script>
<script src="../libreria/plugins/daterangepicker/daterangepicker.js"></script>
<script src="../libreria/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="../libreria/plugins/summernote/summernote-bs4.min.js"></script>
<script src="../libreria/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../libreria/dist/js/adminlte.js"></script>
<!--<script src="../libreria/dist/js/pages/dashboard.js"></script>-->

<script src="../libreria/dist/js/demo.js"></script>


<script src="../libreria/plugins/select2/js/select2.full.min.js"></script>
<script src="../libreria/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<script src="../libreria/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script src="../libreria/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="../libreria/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>

