<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Daftar Halaman</h4>
        <button id="add_button" class="btn btn-primary btn-sm float-right">Tambah Data</button>
      </div>
      <div class="card-body">
        <table class="table table-sm table-bordered table-striped">
          <thead>
            <tr>
              <th width="25">No</th>
              <th>Judul</th>
              <th>Update At</th>
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
<div class="modal fade" id="pageModal" tabindex="-1" role="dialog" aria-labelledby="pageModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pageModalTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="page_form">
        <div class="modal-body">
            <div class="form-group">
              <label>Judul</label>
              <input id="id_page" name="id_page" type="hidden" class="form-control">
              <input id="judul_page" name="judul_page" type="text" class="form-control">
            </div>
            <div class="form-group">
              <label>Isi</label>
                <div class="mb-3">
                <textarea id="isi" name="isi" class="textarea" placeholder="Isi Konten"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>
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
        url: "<?= base_url("masterhalaman/get_data") ?>",
        success: function(data) {
          $('tbody').html(data);
        }
      })
    }

    $('#add_button').click(function() {
      $('#action').val('insert');
      $('#page_form')[0].reset();
      $('.modal-title').text('Add Data');
      $('#pageModal').modal('show');
    });

    $(document).on('click', '.edit-data', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
      $.ajax({
        method: 'post',
        data: {
          id: id
        },
        url: '<?= base_url("masterhalaman/select_data") ?>',
        dataType: 'json',
        success: function(response) {
          $('#action').val('edit');
          $('#id_page').val(response[0].id_page);
          $('#judul_page').val(response[0].judul_page);
            var editorObj = $("#isi").data('wysihtml5');
            var editor = editorObj.editor;
            editor.setValue('Some text dynamically set.');
          $('.modal-title').text('Edit Data');
          $('#pageModal').modal('show');
        }
      })
    })



    $(document).on('click', '.delete-data', function() {
      var id = $(this).data('id');
      if (confirm("Anda Yakin?")) {
        $.ajax({
          url: "<?= base_url("masterhalaman/delete_data")?>",
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

    $('#page_form').on('submit', function(event){
		event.preventDefault();
		if($('#judul_page').val() == '')
		{
			alert("Judul Harus Diisi");
		}
		else
		{
			var form_data = $(this).serialize();
			$.ajax({
				url:"<?= base_url("masterhalaman/update_data") ?>",
				method:"POST",
				data:form_data,
				success:function(data)
				{
					fetch_data();
					$('#page_form')[0].reset();
					$('#pageModal').modal('hide');
				}
			});
		}
	});
  });
</script>