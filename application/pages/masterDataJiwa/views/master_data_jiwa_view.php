<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Daftar Jiwa di <?= APP_REGION; ?></h4>
      </div>
      <div class="border p-3 bg-light">
        <div class="form-group row mb-0">
          <label class="col-2">Dukuh</label>
          <div class="col-4">
            <select id="select_desa" class="custom-select" name="id_dukuh">
              <option value="0">Semua Dukuh</option>
              <?php foreach ($dusun as $key => $row) {
                                                echo '<option value="' . $row->id_dukuh . '">' . $row->dukuh . '</option>';
                                              } ?>
            </select>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table id="table_jiwa" class="table table-sm table-bordered table-striped">
          <thead>
            <tr>
              <th width="25">No</th>
              <th>Periode</th>
              <th>Kepala KK</th>
              <th>Nama</th>
              <th>Hubungan</th>
              <th>Jenis Kelamin</th>
              <th>T.T.L</th>
              <th>Alamat</th>
              <th>Pendidikan</th>
              <th>Pekerjaan</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  $(function() {
    $('#table_jiwa').DataTable({
      "processing": true,
      // "serverSide": true,
      "ordering": true,
      "order": [
        [0, 'asc']
      ],
      "ajax": {
        "url": "<?= base_url('masterDataJiwa/get_data') ?>",
        "type": "POST",
        dataSrc: 'data'
      },
      columns: [
        {"data": "nama_penduduk" },
        {"data": "nama_penduduk" },
        {"data": "nama_kepala" },
        {"data": "nama_penduduk" },
        {"data": "status_keluarga" },
        {"data": "jenis_kelamin" },
        {"data": "tempat_lahir" },
        {"data": "alamat" },
        {"data": "pendidikan" },
        {"data": "pekerjaan" },
      ],
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });

  });
</script>