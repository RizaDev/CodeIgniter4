<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid border border-dark mt-3">
    <div class="row border border-dark ">
        <div class="col border border-dark">
            <h1>Hello, world!</h1>
            <p><?php echo $tes[0] ?></p>
        </div>
    </div>
</div>
<?= $this->endSection() ?>