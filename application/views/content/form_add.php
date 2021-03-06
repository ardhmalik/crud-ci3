<h2 class="text-center">
    <?= $title ?>
</h2>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Fill this form
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="" placeholder="Enter Full Name" required>
                    </div>
                    <div class="form-check form-check-inline mb-3">
                        <input class="form-check-input" type="radio" name="gender" id="genderL" value="Laki-laki">
                        <label class="form-check-label" for="genderL">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline mb-3">
                        <input class="form-check-input" type="radio" name="gender" id="genderP" value="Perempuan">
                        <label class="form-check-label" for="genderP">Perempuan</label>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Address</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Enter Full Address"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="telp" class="form-label">No Telp</label>
                        <input type="tel" class="form-control" name="telp" id="telp" value="" placeholder="Enter Telephone Number" required>
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Class</label>
                        <select class="form-select" name="kelas" id="kelas">
                            <option selected>Choose a class level</option>
                            <option value="10">Sedoso</option>
                            <option value="11">Setunggal Welas</option>
                            <option value="12">Kalih Welas</option>
                        </select>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="status" name="status">
                        <label class="form-check-label" for="status">Active</label>
                    </div>
                    <a href="<?= site_url('crud') ?>" class="btn btn-outline-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>