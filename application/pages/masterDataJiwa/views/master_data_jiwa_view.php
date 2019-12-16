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
              <th></th>
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