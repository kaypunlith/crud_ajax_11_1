  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
   
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
   <script>
         const Uplaod_img=(form)=>{
          var alldata=new FormData($(form)[0]);
          $.ajax({
            type: "POST",
            url: "http://localhost:8080/php_class/Crud_new_ajax/ajax/ajax.php?type=upload",
            data:alldata,
            dataType: "json",
            processData:false,
            contentType:false,
            success: function (response) {
              var img=`
                 <input type="text" name="img" value="${response.img_name}">
                 <img src="./public/temp/${response.img_name}">
                 <button type="button" onclick="Cencel_img('${response.img_name}')" class="btn btn-danger">Cencel</button>
              `
              $(".privew-img").html(img);
              
            }
          });
         }
         const Cencel_img=(image)=>{
           $.ajax({
            type: "POST",
            url: "http://localhost:8080/php_class/Crud_new_ajax/ajax/ajax.php?type=cencel",
            data:{image_Name:image},
            dataType: "json",
            success: function (response) {
              if(response.status==200){
                alert(response.message);
                $(".privew-img").html("");
              }
            }
           });
         }
         const Insert_staff=(form)=>{
          var alldata=$(form).serializeArray();
          $.ajax({
            type: "POST",
            url: "http://localhost:8080/php_class/Crud_new_ajax/ajax/ajax.php?type=insert",
            data:alldata,
            dataType: "json",
            success: function (response) {
              if(response.status==200){
                alert(response.message);
                Select_Staff();
                $(form).trigger('reset');
                $(".privew-img").html("");
                // $("#create").modal('hide');
              }
            }
          });

         }
          const Select_Staff=()=>{
            $.ajax({
              type: "GET",
              url: "http://localhost:8080/php_class/Crud_new_ajax/ajax/ajax.php?type=select",
              dataType: "json",
              success: function (response) {
                var data=response.data;
                var tr='';
                $.each(data, function (index, value) { 
                   tr+=`
                      <tr>
                      <td>${value.id}</td>
                      <td>
                        <img src="./public/image/${value.iamge}" width="60" height="60">
                      </td>
                      <td>${value.name}</td>
                      <td>${value.gender}</td>
                      <td>${value.pos}</td>
                      <td>
                          <button type="button" onclick="Edit_staff(${value.id})" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit">Edit</button>
                          <button type="button" onclick="Delete_staff(${value.id})" class="btn btn-danger">Delete</button>
                      </td>
                  </tr>
                   `
                   $("#tbl_data").html(tr);
                });
              }
            });
          }
          Select_Staff();
          const Delete_staff=(id)=>{
           if(confirm("Are you sure you want to delete")){
            $.ajax({
              type: "POST",
              url: "http://localhost:8080/php_class/Crud_new_ajax/ajax/ajax.php?type=delete",
              data:{del_id:id},
              dataType: "json",
              success: function (response) {
               if(response.status==200){
                Select_Staff();
               }else{
                alert("Delete not succfull");
               }
              }
            });
           }
          }
           const Edit_staff=(id)=>{
            $.ajax({
              type: "POST",
              url: "http://localhost:8080/php_class/Crud_new_ajax/ajax/ajax.php?type=edit",
              data:{edit_id:id},
              dataType: "json",
              success: function (response) {
                var data=response.data;
                $(".id_edit").val(data.id);
                $(".fname").val(data.name);
                $(".gender").val(data.gender);
                $(".pos").val(data.pos);
                $(".old_img").val(data.iamge);
                $(".salary").val(data.salary);
                var img=`
                 
                 <input type="hidden" name="img" value="${data.iamge}">
                 <img src="./public/image/${data.iamge}">
              `
              $(".privew-img").html(img);
              }
            });
           }
           const Update_staff=(form)=>{
               var alldataedit=$(form).serializeArray();
               $.ajax({
                type: "POST",
                url: "http://localhost:8080/php_class/Crud_new_ajax/ajax/ajax.php?type=update",
                data:alldataedit,
                dataType: "json",
                success: function (response) {
                  
                }
               });
           }
 </script>
</body>

</html>