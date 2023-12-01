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
                            <form action="<?= url_to('jadwal-store')?>" method="POST">
                                <?= csrf_field() ?>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="nama_pelajaran">Subjects</label>
                                            <select id="nama_pelajaran" name="nama_pelajaran" class="form-control">
                                                <option value=""></option>
                                                <?php foreach ($bukus as $key => $buku) : ?>
                                                <option value="<?php echo $buku['id']; ?>">
                                                    <?php echo $buku['nama_pelajaran']; ?>
                                                </option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Description</label>
                                            <input type="text" class="form-control" name="deskripsi" id="deskripsi"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="total_jam">Total Hours</label>
                                            <input type="text" class="form-control" name="total_jam" id="total_jam"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="guru">Teachers</label>
                                            <select id="guru" name="guru" class="form-control">
                                                <option value=""></option>
                                                <?php foreach ($gurus as $key => $guru) : ?>
                                                <option value="<?php echo $guru['id'];?>">
                                                    <?php echo $guru['guru']; ?>
                                                </option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 text-right">
                                    <a href="<?= url_to('jadwal') ?>" type="button" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-primary" id="btn_submit">Add Lesson
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