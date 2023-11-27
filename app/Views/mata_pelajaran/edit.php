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
                            <form action="<?= url_to('mata_pelajaran-update')?>" method="POST">
                                <?= csrf_field() ?>
                                <input type="hidden" name="mata_pelajaran_id" value="<?= $mata_pelajaran['id'] ?>">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="nama_pelajaran">Subjects</label>
                                            <input type="text" class="form-control" id="nama_pelajaran" name="nama_pelajaran" value="<?= $mata_pelajaran['nama_pelajaran'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Description</label>
                                            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="3"><?= $mata_pelajaran['deskripsi'] ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="total_jam">Total Hours</label>
                                            <textarea class="form-control" name="total_jam" id="total_jam" cols="30" rows="3"><?= $mata_pelajaran['total_jam'] ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="guru">Teachers</label>
                                            <textarea class="form-control" name="guru" id="guru" cols="30" rows="3"><?= $mata_pelajaran['guru'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 text-right">
                                    <a href="<?= url_to('mata_pelajaran') ?>" type="button" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-primary" id="btn_submit">Update Lesson Timetable</button>
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