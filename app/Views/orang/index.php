<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid center border border-dark my-5">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <h1 class="my-3">Daftar Orang</h1>
            <form action="/orang" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukkan keyword pencarian.." aria-label="Recipient's username" aria-describedby="button-addon2" name="keyword">
                    <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <table style="width: 100%;" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th id="n" scope="col ">Nama</th>
                        <th id="a" scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                    <?php foreach ($orangs as $orang) : ?>
                        <tr>
                            <th style="width:50px" scope="row"><?= $i++; ?></th>
                            <td> <?= $orang['nama']; ?></td>
                            <td> <?= $orang['alamat']; ?></td>
                            <td style="width:500px">
                                <a href="" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $pager->links('orang', 'orang_pagination'); ?>

<?= $this->endSection(); ?>