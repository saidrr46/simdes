<div class="row">
  <div class="col-12">
    <div class="card card-primary">
      <div class="card-header">
        <h4 class="card-title">Pendataan</h4>
      </div>
      <div class="card-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Data KK</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Data Anggota Keluarga</a>
          </li>
        </ul>
        <div class="tab-content pt-3" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <form method="post" id="dusun_form">
              <div class="border p-3 mb-3">
                <div class="form-group row">
                  <label class="col-2">No. Kartu Keluarga</label>
                  <div class="col-10">
                    <input id="id_dukuh" name="id_dukuh" type="hidden" class="form-control">
                    <input id="dukuh" name="dukuh" type="text" class="form-control">
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-2">Nama Kepala Keluarga</label>
                  <div class="col-10">
                    <input id="id_dukuh" name="id_dukuh" type="hidden" class="form-control">
                    <input id="dukuh" name="dukuh" type="text" class="form-control">
                  </div>
                </div>
              </div>
              <h6 class="text-primary">Domisili</h6>
              <div class="border p-3 bg-light">
                <div class="form-group row">
                  <label class="col-2">Propinsi</label>
                  <div class="col-4">
                    <input id="desa" name="propinsi" type="text" class="form-control" value="<?= APP_STATE; ?>" disabled>
                  </div>
                  <label class="col-2">Kabupaten</label>
                  <div class="col-4">
                    <input id="desa" name="kabupaten" type="text" class="form-control" value="<?= APP_CITY; ?>" disabled>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-2">Desa</label>
                  <div class="col-4">
                    <input id="desa" name="dukuh" type="text" class="form-control" value="<?= APP_REGION; ?>" disabled>
                  </div>
                  <label class="col-2">Dukuh</label>
                  <div class="col-4">
                    <select id="select_agama" class="custom-select">
                      <?php foreach ($dusun as $key => $row) {
                        echo '<option value="' . $row->id_dukuh . '">' . $row->dukuh . '</option>';
                      } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-2">RW</label>
                  <div class="col-4">
                    <select id="select_jk" class="custom-select">
                      <option>1</option>
                      <option>2</option>
                    </select>
                  </div>
                  <label class="col-2">RT</label>
                  <div class="col-4">
                    <select id="select_jk" class="custom-select">
                      <option>1</option>
                      <option>2</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-2">Alamat</label>
                  <div class="col-10">
                    <input id="alamat" name="alamat" type="text" class="form-control">
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-2">Keterangan</label>
                  <div class="col-10">
                    <input id="keterangan" name="keterangan" type="text" class="form-control">
                  </div>
                </div>
              </div>


              <div class="modal-footer">
                <input type="submit" name="button_action" id="button_action" class="btn btn-info" value="Simpan" />
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="mb-3">
              <button id="add_button" class="btn btn-sm btn-primary">Tambah Anggota Keluarga</button>
            </div>
            <table class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th width="25">No</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Hubungan</th>
                  <th>JK</th>
                  <th>Pekerjaan</th>
                  <th>Pendidikan</th>
                  <th>Agama</th>
                  <th width="30">Aksi</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="pendudukModal" tabindex="-1" role="dialog" aria-labelledby="pendudukModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-lg">
      <div class="modal-header bg-dark">
        <h5 class="modal-title" id="pendudukModalTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="dusun_form">
        <div class="modal-body">
          <div class="form-group">
            <label>NIK</label>
            <input id="id_dukuh" name="id_dukuh" type="hidden" class="form-control">
            <input id="dukuh" name="dukuh" type="text" class="form-control">
          </div>
          <div class="form-group">
            <label>Nama Penduduk</label>
            <input id="id_dukuh" name="id_dukuh" type="hidden" class="form-control">
            <input id="dukuh" name="dukuh" type="text" class="form-control">
          </div>
          <div class="form-group">
            <label>Agama</label>
            <select id="select_agama" class="custom-select">
              <?php foreach ($agama as $key => $row) {
                echo '<option value="' . $row->id_agama . '">' . $row->agama . '</option>';
              } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Jenis Kelamin</label>
            <select id="select_jk" class="custom-select">
              <option value="1">Laki Laki</option>
              <option value="2">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label>Pekerjaan</label>
            <select id="select_pekerjaan" class="custom-select">
              <?php foreach ($pekerjaan as $key => $row) {
                echo '<option value="' . $row->id_pekerjaan . '">' . $row->pekerjaan . '</option>';
              } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Pendidikan</label>
            <select id="select_pendidikan" class="custom-select">
              <?php foreach ($pendidikan as $key => $row) {
                echo '<option value="' . $row->id_pendidikan . '">' . $row->pendidikan . '</option>';
              } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Status Dalam Keluarga</label>
            <select id="select_status" class="custom-select">
              <?php foreach ($status as $key => $row) {
                echo '<option value="' . $row->id_status_keluarga . '">' . $row->status_keluarga . '</option>';
              } ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="hidden" name="action" id="action" value="insert" />
          <input type="submit" name="button_action" id="button_action" class="btn btn-info" value="Simpan" />
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(function() {
    fetch_data();

    function fetch_data() {
      $.ajax({
        url: "<?= base_url("pendataan/get_data") ?>",
        success: function(data) {
          $('tbody').html(data);
        }
      })
    }

    $('#add_button').click(function() {
      $('#action').val('insert');
      $('#id_dukuh').val('');
      $('#dukuh').val('');
      $('.modal-title').text('Add Data');
      $('#pendudukModal').modal('show');
    });

    $(document).on('click', '.edit-data', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
      $.ajax({
        method: 'post',
        data: {
          id: id
        },
        url: '<?= base_url("pendataan/select_data") ?>',
        dataType: 'json',
        success: function(response) {
          $('#action').val('edit');
          $('#id_dukuh').val(response[0].id_dukuh);
          $('#dukuh').val(response[0].dukuh);
          $('.modal-title').text('Edit Data');
          $('#pendudukModal').modal('show');
        }
      })
    })



    $(document).on('click', '.delete-data', function() {
      var id = $(this).data('id');
      if (confirm("Anda Yakin?")) {
        $.ajax({
          url: "<?= base_url("pendataan/delete_data") ?>",
          method: "POST",
          data: {
            id: id,
          },
          success: function(data) {
            fetch_data();
          }
        });
      }
    });

    $('#dusun_form').on('submit', function(event) {
      event.preventDefault();
      if ($('#dukuh').val() == '') {
        alert("Nama Dukuh Harus Diisi");
      } else {
        var form_data = $(this).serialize();
        $.ajax({
          url: "<?= base_url("pendataan/update_data") ?>",
          method: "POST",
          data: form_data,
          success: function(data) {
            fetch_data();
            $('#dusun_form')[0].reset();
            $('#pendudukModal').modal('hide');
          }
        });
      }
    });
  });
</script>