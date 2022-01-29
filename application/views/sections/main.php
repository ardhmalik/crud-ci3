<div class="row justify-content-center">
    <div class="col-auto">
        <h3 class="text-center">
            Table Siswa
        </h3>
        <!-- Add button -->
        <div class="d-flex btn-card-plan">
            <div class="ms-auto p-3">
                <a type="button" href="<?= site_url('crud/add') ?>" class="btn btn-primary">
                    Add New Data
                </a>
            </div>
        </div>
        <!-- Table -->
        <table class="table table-hover table-bordered table-striped mb-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Address</th>
                    <th scope="col">Class</th>
                    <th scope="col">No Telp</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($siswa as $sw) : ?>
                <tr>
                    <th scope="row">
                        <?= $sw['id_siswa'] ?>
                    </th>
                    <td>
                        <?= $sw['nama'] ?>
                    </td>
                    <td>
                        <?= $sw['jenis_kel'] ?>
                    </td>
                    <td>
                        <?= $sw['alamat'] ?>
                    </td>
                    <td>
                        <?= $sw['kelas'] ?>
                    </td>
                    <td>
                        <?= $sw['telp'] ?>
                    </td>
                    <td>
                        <?= $sw['status'] ?>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>