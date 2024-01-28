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
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= $data['title']; ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="<?= base_url; ?>/kelas/updateKelas" method="POST">
                <input type="hidden" name="id" value="<?= $data['kelas']['KelasID']; ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Kelas</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama kelas..." name="nama_kelas">
                    </div>
                    <div class="form-group">
                        <label>Mahasiswa</label>
                        <select class="form-control" name="mahasiswa_id">
                            <option value="">Pilih Mahasiswa</option>
                            <?php foreach ($data['mahasiswa'] as $mahasiswa) : ?>
                                <option value="<?= $mahasiswa['MahasiswaID']; ?>" <?= ($mahasiswa['MahasiswaID'] == $data['mahasiswa']) ? 'selected' : ''; ?>>
                                    <?= $mahasiswa['Nama']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Fakultas</label>
                        <select class="form-control" name="fakultas_id">
                            <option value="">Pilih Fakultas</option>
                            <?php foreach ($data['fakultas'] as $fakultas) : ?>
                                <option value="<?= $fakultas['FakultasID']; ?>" <?= ($fakultas['FakultasID'] == $data['fakultas']) ? 'selected' : ''; ?>>
                                    <?= $fakultas['NamaFakultas']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->