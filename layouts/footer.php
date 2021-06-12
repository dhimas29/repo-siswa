<footer class="main-footer">
    <strong>Copyright &copy; 2021.</strong>
    All rights reserved.
    <!-- <div class="float-right d-none d-sm-inline-block">
        <b>Created By : </b> Faqih
    </div> -->
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
<!-- </div> -->
<!-- ./wrapper -->

<!-- Boostrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../assets/plugins/moment/moment.min.js"></script>
<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../assets/dist/js/pages/dashboard.js"></script>

<script type="text/javascript">
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
</script>

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
        $('#dataTables-result').DataTable({
            responsive: true,
            order: []
        });
        $('#dataTables-ranking').DataTable({
            responsive: true,
            order: []
        });
        $('#dataTables-kecocokan').DataTable({
            responsive: true,
            order: []
        });

    });
</script>
<script>
    $('#add_sub').change(function(e) {
        var pilihan = $('#add_sub').val();
        if (pilihan == "Punya") {
            $('#sub').after('<div class="row form-group" id="sub_comp">                                        <div class="col-lg-3 col-lg-offset-3">                                            <button type="button" id="btn_add_sub" class="btn btn-md btn-success">                                                <i class="fa fa-plus"></i>                                                Tambah Subkriteria                                            </button>                                        </div>                                        <div class="col-lg-6" id="sub_form">                                                                                    </div>                                    </div>');
            $('#btn_add_sub').click(function(e) {
                $('#sub_form').append('<div class="row form-group"><div class="col-lg-5"><input class="form-control" type="text" name="sub_nama[]" placeholder="Nama SubKriteria"></div><div class="col-lg-5"><input class="form-control" type="number" name="sub_bobot[]" placeholder="Bobot SubKriteria"></div><div class="col-lg-2"><button onclick="btn_remove(this)" type="button" class="btn btn-md btn-danger"><i class="fa fa-remove"></i></button></div></div>');
            });
        } else {
            $('#sub_comp').remove();
        }
    });
</script>
<script type="text/javascript">
    function btn_remove(argument) {
        var r = confirm("Are You Sure?");
        if (r == true) {
            argument.parentElement.parentElement.remove();
        }

    }
</script>

<script>
    $(function() {
        // Summernote
        $('#summernote').summernote()

        // CodeMirror
        // CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        //     mode: "htmlmixed",
        //     theme: "monokai"
        // });
    })
</script>
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<script type="text/javascript">
    $("#kelas").change(function() {
        var kelas = $("#kelas").val();
        window.location.href = "index.php?page=nilai&id=" + kelas;
    })
</script>
<script type="text/javascript">
    $("#kriteria").change(function() {
        var id_kriteria = $("#kriteria").val();
        window.location.href = "?page=perbandingan_alternatif&id=" + id_kriteria;
    });

    $('input[name="kriteria[C1]"]').click(function() {
        if ($(this).attr("id") == "Lainnya") {
            $('#lain_C1').prop('hidden', false);
        } else {
            $('#lain_C1').prop('hidden', true);
        }
    });

    $('input[name="kriteria[C2]"]').click(function() {
        if ($(this).attr("id") == "Lainnya") {
            $('#lain_C2').prop('hidden', false);
        } else {
            $('#lain_C2').prop('hidden', true);
        }
    });
    $('input[name="kriteria[C3]"]').click(function() {
        if ($(this).attr("id") == "Lainnya") {
            $('#lain_C3').prop('hidden', false);
        } else {
            $('#lain_C3').prop('hidden', true);
        }
    });
    $('input[name="kriteria[C4]"]').click(function() {
        if ($(this).attr("id") == "Lainnya") {
            $('#lain_C4').prop('hidden', false);
        } else {
            $('#lain_C4').prop('hidden', true);
        }
    });
    $('input[name="kriteria[C5]"]').click(function() {
        if ($(this).attr("id") == "Lainnya") {
            $('#lain_C5').prop('hidden', false);
        } else {
            $('#lain_C5').prop('hidden', true);
        }
    });
</script>

</body>

</html>