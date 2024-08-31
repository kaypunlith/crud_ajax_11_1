

<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width:50%">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="" id="formUpEmp" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row">
                 <div class="col-xl-7">
                    <div class="form-group">
                        <input type="hidden" name="id_edit" class="id_edit">
                        <label for="" class="form-label">Enter Full Name </label>
                        <input type="text" class="fname form-control" name="fname">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Enter Geder</label>
                         <select name="gender" id="gender" class="gender form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                         </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Enter Position</label>
                        <input type="text" class="form-control pos" name="pos">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Enter salary</label>
                        <input type="text" class="form-control salary" name="salry">
                    </div>
                 </div>
                 <div class="col-xl-5">
                     <div class="d-flex justify-content-between">
                     <input type="file" name="img" class="form-control">
                     <input type="text" name="old_img" class="old_img">
                     <button type="button" onclick="Uplaod_img('#formUpEmp')" class="btn btn-info">Upload</button>
                     </div>
                     <div class="privew-img">
                         
                     </div>
                 </div>
            
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="button" onclick="Update_staff('#formUpEmp')" class="btn btn-primary">Update</button>
          </div>
        </form>
    </div>
  </div>
</div>