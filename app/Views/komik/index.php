<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid border border-dark my-5">

    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <h1 class="my-3">Daftar Komik</h1>
            <a id="tk" href="/komik/create" class="d-inline-flex justify-content-center  btn btn-primary my-3">Tambah Data Komik</a>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <table class="tabel">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th style="text-align:center;" scope="col ">Sampul</th>
                        <th style="text-align:center;" scope="col">Judul</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($komiks as $komik) : ?>
                        <tr>
                            <th style="width:50px" scope="row"><?= $i++; ?></th>
                            <td style="width: 500px;"><img src="/img/<?= $komik['sampul']; ?> " alt="" width="300px"></td>
                            <td style="width:500px; text-align:center;"><?= $komik['judul']; ?></td>
                            <td style="width:500px">
                                <a href="/komik/<?= $komik['slug']; ?>" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>