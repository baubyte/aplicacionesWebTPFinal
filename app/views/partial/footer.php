<script src="<?php echo URL_ROOT; ?>/jquery/jquery-3.5.1.min.js"></script>
<script src="<?php echo URL_ROOT; ?>/js/popper.min.js"></script>
<script src="<?php echo URL_ROOT; ?>/js/bootstrap.min.js"></script>
<!-- Check JS Datatables -->
<?php 
if (isset($data['dataTables'])) {
    require_once APP_ROOT . "/views/partial/js/jsDataTables.php"; 
}
?>
<script src="<?php echo URL_ROOT; ?>/js/main.js"></script>
</body>

</html>