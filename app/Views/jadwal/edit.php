<?= $this->extend('layouts/template'); ?>

<?= $this->Section('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $page_title ?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="<?= url_to('jadwal-update')?>" method="POST">
                                <?= csrf_field() ?>
                                <input type="hidden" name="jadwal_id" value="<?= $jadwal['id'] ?>">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="nama_pelajaran">Subjects</label>
                                            <select id="nama_pelajaran" class="form-control" name="nama_pelajaran"
                                                class="nama_pelajaran">
                                                <option class=""></option>
                                                <?php foreach ($bukus as $key => $buku) : ?>
                                                <option value="<?php echo $buku['id']; ?>"
                                                    <?php if($jadwal['nama_pelajaran_id'] == $buku['id']) echo "selected"; ?>>
                                                    <?php echo $buku['nama_pelajaran']; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Description</label>
                                            <input type="text" class="form-control" name="deskripsi" id="deskripsi"
                                                value="<?= $jadwal['deskripsi'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="total_jam">Total Hours</label>
                                            <input type="text" class="form-control" name="total_jam" id="total_jam"
                                                value="<?= $jadwal['total_jam'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="guru">Teachers</label>
                                            <select id="guru" class="form-control" name="guru" class="guru">
                                                <option value=""></option>
                                                <?php foreach ($gurus as $key => $guru) : ?>
                                                <option value="<?php echo $guru['id']; ?>"
                                                    <?php if($jadwal['guru_id'] == $guru['id']) echo "selected"; ?>>
                                                    <?php echo $guru['guru']; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 text-right">
                                    <a href="<?= url_to('jadwal') ?>" type="button" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-primary" id="btn_submit">Update Lesson
                                        Timetable</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>



<?= $this->endSection('content'); ?>