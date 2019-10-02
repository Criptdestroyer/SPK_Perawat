            <div class="footer">
                <div class="float-right">
                    Universitas Sriwijaya <strong>Sistem Informasi</strong>
                </div>
                <div>
                    <strong>Copyright</strong> Dina Agustina &copy; 2019
                </div>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?= base_url() ?>assets/Admin/js/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url() ?>assets/Admin/js/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/Admin/js/bootstrap.js"></script>
    <script src="<?= base_url() ?>assets/Admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?= base_url() ?>assets/Admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?= base_url() ?>assets/Admin/js/inspinia.js"></script>
    <script src="<?= base_url() ?>assets/Admin/js/plugins/pace/pace.min.js"></script>

    <script src="<?= base_url() ?>assets/Admin/js/plugins/dataTables/datatables.min.js"></script>
    <script src="<?= base_url() ?>assets/Admin/js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>
</body>
</html>
