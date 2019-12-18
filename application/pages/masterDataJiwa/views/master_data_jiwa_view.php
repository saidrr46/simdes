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
            <select id="select_dusun" class="custom-select" name="id_dukuh">
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
              <th>Kepala KK</th>
              <th>NIK</th>
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
        var t = $('#table_jiwa').DataTable({
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
          columns: [{
              "data": null,
              className: "text-center"
            },
            {
              "data": "nama_kepala"
            },
            {
              "data": "nik"
            },
            {
              "data": "nama_penduduk"
            },
            {
              "data": "status_keluarga"
            },
            {
              "data": "jenis_kelamin"
            },
            {
              "data": "tempat_lahir"
            },
            {
              "render": function(data, type, row) { // Tampilkan kolom aksi
                return row.alamat + ' RT. ' + row.rt + ' RW. ' + row.rw + ' Dusun ' + row.dukuh
              }
            },
            {
              "data": "pendidikan"
            },
            {
              "data": "pekerjaan"
            },
          ],
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
        });
        t.on('order.dt search.dt', function() {
          t.column(0, {
            search: 'applied',
            order: 'applied'
          }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
          });
        }).draw();

      $('#select_dusun').on('change', function() {
          t.ajax.url('<?= base_url("masterDataJiwa/get_data?id='+ $(this).val() +'") ?>').load();
      })
  });
</script>