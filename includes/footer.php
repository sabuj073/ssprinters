        <!-- footer start-->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 footer-copyright">
                        <p class="mb-0">Copyright 2020 © <?=$info['shop_name']; ?> All rights reserved.</p>
                    </div>
                    <div class="col-md-6">
                        <p class="pull-right mb-0">Developed By: <a target="_blank" href="https://techdynobd.com/">TechdynoBD</a><i class="fa fa-heart"></i></p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer end-->
    </div>

</div>

<!-- latest jquery-->
<script src="assets/js/jquery-3.3.1.min.js"></script>

<!-- Bootstrap js-->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.js"></script>

<!-- feather icon js-->
<script src="assets/js/icons/feather-icon/feather.min.js"></script>
<script src="assets/js/icons/feather-icon/feather-icon.js"></script>

<!-- Sidebar jquery-->
<script src="assets/js/sidebar-menu.js"></script>

<!--chartist js-->
<script src="assets/js/chart/chartist/chartist.js"></script>

<!--chartjs js-->
<script src="assets/js/chart/chartjs/chart.min.js"></script>

<!-- lazyload js-->
<script src="assets/js/lazysizes.min.js"></script>

<!--copycode js-->
<script src="assets/js/prism/prism.min.js"></script>
<script src="assets/js/clipboard/clipboard.min.js"></script>
<script src="assets/js/custom-card/custom-card.js"></script>

<!--counter js-->
<script src="assets/js/counter/jquery.waypoints.min.js"></script>
<script src="assets/js/counter/jquery.counterup.min.js"></script>
<script src="assets/js/counter/counter-custom.js"></script>

<!--peity chart js-->
<script src="assets/js/chart/peity-chart/peity.jquery.js"></script>

<!--sparkline chart js-->
<script src="assets/js/chart/sparkline/sparkline.js"></script>

<!--Customizer admin-->
<script src="assets/js/admin-customizer.js"></script>

<!--dashboard custom js-->
<script src="assets/js/dashboard/default.js"></script>

<!--right sidebar js-->
<script src="assets/js/chat-menu.js"></script>

<!--height equal js-->
<script src="assets/js/height-equal.js"></script>

<!-- lazyload js-->
<script src="assets/js/lazysizes.min.js"></script>

<!--script admin-->
<script src="assets/js/admin-script.js"></script>
<script src="assets/js/sweet-alert.js"></script>

<!-- Jsgrid js-->
<script src="assets/js/jsgrid/jsgrid.min.js"></script>
<script src="assets/js/jsgrid/griddata-users.js"></script>
<script src="assets/js/jsgrid/jsgrid-users.js"></script>

<!-- Datatables js-->
<!-- <script src="assets/js/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/js/datatables/custom-basic.js"></script> -->

    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables/jszip.min.js"></script>
    <script src="assets/plugins/datatables/pdfmake.min.js"></script>
    <script src="assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="assets/plugins/datatables/buttons.print.min.js"></script>
    <script src="assets/plugins/datatables/buttons.colVis.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2();
        });
        function update_error(){
            document.getElementById("error").play();
            Swal.fire({
              title: 'Warning!',
              text: 'Error Occured',
              icon: 'warning',
              confirmButtonText: 'Exit'
          })
        }
        function update_msg(){
            document.getElementById("success").play();
            Swal.fire({
              title: 'Success!',
              text: 'Successful.',
              icon: 'success',
              confirmButtonText: 'Okay'
          })
        }
        function email_error(){
            document.getElementById("error").play();
            Swal.fire({
              title: 'Warning!',
              text: 'Email already in use.',
              icon: 'warning',
              confirmButtonText: 'Exit'
          })
        }
    </script>


</body>

</html>