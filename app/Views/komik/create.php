<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-md-6">
            <h1>Form Tambah Data Komik</h1>


            <form action="/komik/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="judul" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" autofocus value="<?= old('judul'); ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('judul'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input type="text" class="form-control  <?= ($validation->hasError('penulis')) ? 'is-invalid' : ''; ?>" id="penulis" name="penulis" value="<?= old('penulis'); ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('penulis'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input type="text" class="form-control  <?= ($validation->hasError('penerbit')) ? 'is-invalid' : ''; ?>" id="penerbit" name="penerbit" value="<?= old('penerbit'); ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('penerbit'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="sampul" class="form-label">Sampul</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input class="form-control <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" type="file" id="sampul" name="sampul" value="<?= old('sampul'); ?>" onchange="previewImage()">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('sampul'); ?>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>