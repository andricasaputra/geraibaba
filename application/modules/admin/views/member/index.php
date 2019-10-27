<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">List Member</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12">
    <?php $this->load->view('layouts/message'); ?>
  </div>
</div>

<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="display responsive table-bordered table-hover" id="demo" cellpadding="5" width="100%" style="font-size: 12px; text-align: center;">
              <thead>
                <tr>
        					<th>No.</th>
                  <th>Action</th>
                  <th class="text-center">Nama Lengkap</th>
        					<th class="text-center">Email</th>
                  <th class="text-center">Telephone</th>
                  <th class="text-center">Alamat</th>
                  <th class="text-center">Role</th>
                </tr>
              </thead>
              <tbody>
              <?php $i = 1; ?>
              <?php foreach($member as $m): ?>
                <tr>
                  <td class="text-center"><?php echo $i++; ?></td>
                  <td class="text-center">
                      <a href="<?php echo base_url('admin/member/delete'); ?>/<?php echo $m['id'] ?>" onclick="return confirm('Yakin ingin dihapus?')" class="btn btn-outline btn-icons btn-danger btn-rounded">
                        <i class="mdi mdi-delete-forever"></i>
                      </a> 
                      <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline btn-icons btn-primary btn-rounded showmodal" data-nama="<?php echo $m['nama_depan']. ' '. $m['nama_belakang'] ?>" data-id="<?php echo $m['id'] ?>" >
                      <i class="mdi mdi-eye"></i>
                    </button>
                  </td>
                  <td><?php echo $m['nama_depan']. ' '. $m['nama_belakang'] ?></td>
                  <td><?php echo $m['email'] ?></td>
                  <td class="text-center"><?php echo $m['telp'] ?></td>
                  <td><?php echo $m['alamat'] ?></td>
                  <td><?php echo $m['name'] ?></td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addRoleMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Role Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form id="addRole">

        <div class="modal-body">
          
            <div class="row">
              <label>ID Member</label>
              <input type="text" name="id" class="form-control">
            </div>

            <div class="row">
              <label>Nama Member</label>
              <input type="text" name="nama" class="form-control">
            </div>

            <div class="row">
              <label>Pilih Role</label>
              <select name="role" class="form-control" id="role">
                <option selected disabled>-Pilih Role-</option>
                <?php foreach ($roles as $key => $role) { ?>
                 <option value="<?php echo $role['id'] ?>"><?php echo $role['name'] ?></option>
                <?php } ?>
              </select>
            </div>

          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="saveRole">Save changes</button>
        </div>

      </form>
    </div>
  </div>
</div>

<script>

$(document).ready(function(){

  $('.showmodal').click(function(e){

    const id = $(this).data('id');
    const nama = $(this).data('nama');
    
    $('input[name=id]').val(id);
    $('input[name=nama]').val(nama);

    $('#addRoleMember').modal('show');

    $('#role').change(function(){

        const role = $(this).val();

        $('#addRole').submit(function(e){

          e.preventDefault();

          $('#saveRole').attr('disabled', 'disabled');

          sendAjax(role);

          $('#saveRole').prop('disabled', false);

        });
       
    });

    function sendAjax(role)
    {
        $.ajax({
          url: "<?php echo base_url('admin/member/updateRoleMember') ?>/" + id,
          method: 'POST',
          data:{
            role: role
          }
        }).done(function(res){
          location.reload();
        });
    }

  });

  
  $('#demo').DataTable({
      scrollX: true,
      scrollY:"500px",
      scrollCollapse: true,
      scroller:true,
      pageLength: 6
  });


});
</script>