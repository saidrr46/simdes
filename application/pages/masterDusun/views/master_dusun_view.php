<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Daftar Dusun di <?= APP_REGION; ?></h4>
        <button id="add_button" class="btn btn-primary btn-sm float-right">Tambah Data</button>
      </div>
      <div class="card-body">
        <table class="table table-sm table-bordered table-striped">
          <thead>
            <tr>
              <th width="25">No</th>
              <th>Nama Dusun</th>
              <th>Kepala Dusun</th>
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

<!-- Modal -->
<div class="modal fade" id="dusunModal" tabindex="-1" role="dialog" aria-labelledby="dusunModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="dusunModalTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="dusun_form">
        <div class="modal-body">
            <div class="form-group">
              <label>Nama Dusun</label>
              <input id="id_dukuh" name="id_dukuh" type="hidden" class="form-control">
              <input id="dukuh" name="dukuh" type="text" class="form-control">
            </div>
            <div class="form-group">
              <label>Kepala Dusun</label>
              <input id="id_penduduk" name="id_penduduk" type="text" class="form-control">
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
        url: "<?= base_url("masterdusun/get_data") ?>",
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
        url: '<?= base_url("masterdusun/select_data") ?>',
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
          url: "<?= base_url("masterdusun/delete_data")?>",
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
				url:"<?= base_url("masterdusun/update_data") ?>",
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