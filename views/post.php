<?php $this->layout('base'); ?>
<?php $this->start('content'); ?>
    <h2><?php echo $this->e($pageTitle); ?></h2>
    <?php echo $doc['htmlContent']; ?>

<?php $this->stop('content'); ?>
