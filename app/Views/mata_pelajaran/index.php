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

    <!-- Main Content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Manage Subjects</h3>
                            <div class="d-flex justify-content-end mb-1">
                                <a href="<?= url_to('mata_pelajaran-create') ?>" class="btn btn-success mb-2"
                                    id="btn_modal_create">Create</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="mata_pelajaran_table" class="table table-bordered table-hover masterdata-datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pelajaran</th>
                                        <th width="50%">Deskripsi</th>
                                        <th width="150">Total Jam</th>
                                        <th width="150">guru</th>
                                        <th width="150">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($mata_pelajarans as $key => $mata_pelajaran) : ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $mata_pelajaran['nama_pelajaran'] ?></td>
                                        <td><?= $mata_pelajaran['deskripsi'] ?></td>
                                        <td><?= $mata_pelajaran['total_jam'] ?></td>
                                        <td><?= $mata_pelajaran['guru'] ?></td>
                                        <td>
                                            <a href="<?= url_to('mata_pelajaran-edit', $mata_pelajaran['id'])?>"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <a href="<?= url_to('mata_pelajaran-delete', $mata_pelajaran['id'])?>"
                                                class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-boody -->
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