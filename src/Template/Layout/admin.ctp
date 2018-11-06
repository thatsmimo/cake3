<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title; ?>
    </title>
    <link href="<?= $this->request->webroot?>img/<?= $setting['favicon']?>" type="image/x-icon" rel="icon"/><link href="<?= $this->request->webroot ?>img/<?= $setting['favicon'] ?>" type="image/x-icon" rel="shortcut icon"/>
    <?php  //$this->Html->meta('icon') ?>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo $this->request->webroot ?>vendors/font-awesome/css/font-awesome.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <?= $this->Html->css('adminlte.css') ?>
    <?= $this->Html->css('default.css') ?>
    
    <!-- jQuery -->
    <script src="<?php echo $this->request->webroot ?>vendors/jquery/jquery.min.js"></script>
    <?= $this->fetch('meta') ?>
    <?php //$this->fetch('css') ?>
    <?php //$this->fetch('script') ?>
</head>
<body>
    <?php // $this->Flash->render() ?>
        <?php
echo $this->element('admin_header');
echo $this->element('admin_sidebar');
?>
        <?= $this->fetch('content') ?>
    </div>
   <?= $this->element('admin_footer'); ?>

    

</body>
<!-- REQUIRED SCRIPTS -->

<!-- Bootstrap -->
<script src="<?php echo $this->request->webroot ?>vendors/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<?= $this->Html->script('adminlte.js') ?>
<?= $this->Html->script('app.js') ?>



<!-- PAGE <?php echo $this->request->webroot ?>vendors -->

<!-- DataTable -->
<script src="<?= $this->request->webroot; ?>vendors/datatables/jquery.dataTables.js"></script>

<!-- SlimScroll 1.3.0 -->
<script src="<?php echo $this->request->webroot ?>vendors/slimScroll/jquery.slimscroll.min.js"></script>

<!-- PAGE SCRIPTS -->
<?php // $this->Html->script('dashboard2.js') ?>
</html>
<script>
$(document).ready( function(){
    setTimeout(function() {
        $('.alert').slideUp();
    }, 3000);
})
</script>