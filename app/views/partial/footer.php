<script src="<?php echo URL_ROOT; ?>/jquery/jquery-3.5.1.min.js"></script>
<!-- JS Bootstrap -->
<script src="<?php echo URL_ROOT; ?>/js/popper.min.js"></script>
<script src="<?php echo URL_ROOT; ?>/js/bootstrap.min.js"></script>
<!-- JS Select2 -->
<script src="<?php echo URL_ROOT; ?>/js/select2.min.js"></script>
<!-- Check JS Datatables -->
<?php
if (isset($data['dataTables'])) {
    require_once APP_ROOT . "/views/partial/js/jsDataTables.php";
}
?>
<script src="<?php echo URL_ROOT; ?>/js/main.js"></script>
<script>
    var carrera = 1;
    $('#materias').select2({
        ajax: {
            theme: 'bootstrap4',
            method: 'GET',
            url: "<?php echo URL_ROOT?>/materiausuario/getMateriaUsuarioByCarrera/"+carrera,
            dataType: 'json',
        }
    });
</script>
</body>

</html>