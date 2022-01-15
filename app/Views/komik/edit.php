<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h1>Form Edit Data Komik</h1>


            <form action="/komik/update/<?= $komik['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $komik['slug']; ?>">
                <input type="hidden" name="sampulLama" value="<?= $komik['sampul']; ?>">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <?php if (!old('judul')) : ?>
                        <input type="judul" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" autofocus value="<?= $komik['judul']; ?>">
                    <?php else : ?>
                        <input type="judul" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" autofocus value="<?= old('judul'); ?>">
                    <?php endif ?>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('judul'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input type="text" class="form-control  <?= ($validation->hasError('penulis')) ? 'is-invalid' : ''; ?>" id="penulis" name="penulis" value="<?= (old('penulis')) ? old('penulis') : $komik['penulis']; ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('penulis'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input type="text" class="form-control  <?= ($validation->hasError('penerbit')) ? 'is-invalid' : ''; ?>" id="penerbit" name="penerbit" value="<?= (old('penerbit')) ? old('penerbit') : $komik['penerbit']; ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('penerbit'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="sampul" class="form-label">Sampul</label>
                    <?php if ($komik['sampul']) : ?>
                        <img src="/img/<?= $komik['sampul']; ?>" class="img-fluid mb-3 col-sm-5 d-block">
                    <?php else : ?>
                        <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    <?php endif; ?>
                    <input class="form-control <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" type="file" id="sampul" name="sampul" onchange="previewImage()">
                    <div id=" validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('sampul'); ?>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Edit Data</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>