<?php include 'header.php' ?>

<?php if ($nivel == '5') { ?>
    <?php include 'home_admin.php' ?>
<?php } else { ?>
    <?php include 'home_anfitriao.php' ?>
<?php } ?>


<?php include 'footer.php' ?>