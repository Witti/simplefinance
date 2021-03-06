<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.1/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.0/js/bootstrap-colorpicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fastclick/1.0.6/fastclick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- iCheck -->
<script src="/plugins/iCheck/icheck.min.js"></script>

<!-- AdminLTE App -->
<script src="/js/app.min.js"></script>

<script>
    $('.selectpicker').selectpicker({
        style: 'btn-primary',
        size: 4,
        liveSearch: true
    });

    $('.delthis').click(function(e) {
        if (!window.confirm('Are you sure?')) {
            e.preventDefault();
        }
    });

    $('.input-group.date').datepicker({
        format: "dd.mm.yyyy",
        todayHighlight: true
    });

    $('.categorycolor').colorpicker({
        format: "hex"
    });

    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });

    $('#accountstable, #categoriestable').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": false,
        "autoWidth": true
    });

    $('#transactionstable').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": true
    });

    if($('.transfer-checkbox').is(':checked')){
        $('.transfer-account-fg').show();
    } else {
        $('.transfer-account-fg').hide();
    }

    $('.transfer-checkbox').on('ifChecked', function(event){
        $('.transfer-account-fg').show();
    });
    $('.transfer-checkbox').on('ifUnchecked', function(event){
        $('.transfer-account-fg').hide();
    });

    $('[data-toggle="tooltip"]').tooltip()
</script>

@if(isset($categoryusage) && $categoryusage && count($categoryusage) > 0)
    <script>
        var pieChartCanvas = $("#categoryusageChart").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);

        var PieData = [
            @foreach($categoryusage as $c)
                {
                    value: {{ $c->total }},
                    color: "#{{ $c->color }}",
                    label: "{{ $c->title }}"
                },
            @endforeach
        ];
        var pieOptions = {
            segmentShowStroke: false,
            segmentStrokeWidth: 1,
            percentageInnerCutout: 15, // This is 0 for Pie charts
            animationSteps: 100,
            animationEasing: "easeOutBounce",
            animateRotate: true,
            animateScale: true,
            responsive: true,
            maintainAspectRatio: false,
        };
        pieChart.Doughnut(PieData, pieOptions);
    </script>
@endif
