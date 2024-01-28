<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $data['title']; ?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <?php
                Flasher::Message();
                ?>
            </div>
        </div>
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= $data['title'] ?></h3>
                <div class="btn-group float-right">
                    <a href="<?= base_url; ?>/kelas/tambah" class="btn float-right btn-xs btn btn-primary">Tambah Kelas</a>
                    <a href="<?= base_url; ?>/kelas/laporan" class="btn float-right btn-xs btn btn-info" target="_blank">Laporan Kelas</a>
                    <a href="<?= base_url; ?>/kelas/lihatlaporan" class="btn float-right btn-xs btn btn-warning" target="_blank">Lihat Laporan Kelas</a>
                    <a href="<?= base_url; ?>/kelas/laporanJumlahKelas" class="btn float-right btn-xs btn btn-success" target="_blank">Lihat Mahasiswa Per Kelas</a>

                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Nama Kelas</th>
                            <th>ID Mahasiswa</th>
                            <th>ID Fakultas</th>
                            <th style="width:150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($data['kelas'] as $row) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row['Nama_Kelas']; ?></td>
                                <td><?= $row['MahasiswaID']; ?></td>
                                <td><?= $row['FakultasID']; ?></td>
                                <td>
                                    <a href="<?= base_url; ?>/kelas/edit/<?= $row['KelasID'] ?>" class="badge badge-info">Edit</a>
                                    <a href="<?= base_url; ?>/kelas/hapus/<?= $row['KelasID'] ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                                </td>
                            </tr>
                            <?php $no++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->