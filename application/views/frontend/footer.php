    <!-- Essential javascripts for application to work-->

    <script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?php echo base_url() ?>assets/js/pace.min.js"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#myTable').DataTable();</script>
    <script>
        $(document).ready(function(){
            $('#start_date').datetimepicker({
                minView: 2, 
                pickTime: false, 
                format: 'dd M yyyy',
                language: 'pt-BR',
                autoclose: true,
                todayHighlight:'TRUE', 
                startDate: '-0d',
            });
            $('#end_date').datetimepicker({
                minView: 2, 
                pickTime: false, 
                format: 'dd M yyyy',
                language: 'pt-BR',
                autoclose: true,
                todayHighlight:'TRUE', 
                startDate: '-0d',
            });
        });
    </script>
</body>
</html>