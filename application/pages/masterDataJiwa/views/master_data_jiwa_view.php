<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Daftar Jiwa di <?= APP_REGION; ?></h4>
      </div>

              <div class="border p-3 bg-light">
                <div class="form-group row">
                  <label class="col-2">Provinsi</label>
                  <div class="col-4">
                    <input id="desa" name="propinsi" type="text" class="form-control" value="<?= APP_STATE; ?>" disabled>
                  </div>
                  <label class="col-2">Kabupaten</label>
                  <div class="col-4">
                    <input id="desa" name="kabupaten" type="text" class="form-control" value="<?= APP_CITY; ?>" disabled>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-2">Kecamatan</label>
                  <div class="col-4">
                    <input id="desa" name="propinsi" type="text" class="form-control" value="<?= APP_STATE; ?>" disabled>
                  </div>
                  <label class="col-2">Desa</label>
                  <div class="col-4">
                    <input id="desa" name="kabupaten" type="text" class="form-control" value="<?= APP_REGION; ?>" disabled>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-2">Desa</label>
                  <div class="col-4">
                    <input id="desa" name="dukuh" type="text" class="form-control" >
                  </div>
                  <label class="col-2">RW</label>
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



              <div class="modal-footer">
                <input type="submit" name="button_action" id="button_action" class="btn btn-info" value="Simpan" />
              </div>
            </form>
          </div>
      <div class="card-body">
        <table class="table table-sm table-bordered table-striped">
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
    fetch_data();

    function fetch_data() {
      $.ajax({
        url: "<?= base_url("masterDataJiwa/get_data") ?>",
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
      $('#dusunModal').modal('show');
    });

    $(document).on('click', '.edit-data', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
      $.ajax({
        method: 'post',
        data: {
          id: id
        },
        url: '<?= base_url("masterDataJiwa/select_data") ?>',
        dataType: 'json',
        success: function(response) {
          $('#action').val('edit');
          $('#id_dukuh').val(response[0].id_dukuh);
          $('#dukuh').val(response[0].dukuh);
          $('.modal-title').text('Edit Data');
          $('#dusunModal').modal('show');
        }
      })
    })



    $(document).on('click', '.delete-data', function() {
      var id = $(this).data('id');
      if (confirm("Anda Yakin?")) {
        $.ajax({
          url: "<?= base_url("masterDataJiwa/delete_data")?>",
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

    $('#dusun_form').on('submit', function(event){
		event.preventDefault();
		if($('#dukuh').val() == '')
		{
			alert("Nama Dukuh Harus Diisi");
		}
		else
		{
			var form_data = $(this).serialize();
			$.ajax({
				url:"<?= base_url("masterDataJiwa/update_data") ?>",
				method:"POST",
				data:form_data,
				success:function(data)
				{
					fetch_data();
					$('#dusun_form')[0].reset();
					$('#dusunModal').modal('hide');
				}
			});
		}
	});
  });
</script>