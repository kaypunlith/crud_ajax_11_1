

<body>

<?php 
include("./components/header.php");
include("./components/sidbar.php");
include("./Modals/create.php");
include("./Modals/edit.php");
?>



  <main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between">
      <h1>Employee</h1>
      <a href="" class="btn btn-primary rounded-0" data-bs-toggle="modal" data-bs-target="#create">Create</a>
    
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
          <table class="table table-striped table-hover shadow align-middle">
               <thead>
                  <tr>
                      <th>Code</th>
                      <th>Name</th>
                      <th>Gender</th>
                      <th>Position</th>
                      <th>salary</th>
                      <th>Action</th>
                  </tr>
               </thead>
               <tbody id="tbl_data">
                <!-- <tr>
                    <td>1</td>
                    <td>123.png</td>
                    <td>sok Dara</td>
                    <td>Male</td>
                    <td>IT</td>
                    <td>
                        <button type="button" class="btn btn-warning">Edit</button>
                        <button type="button" class="btn btn-danger">Delete</button>
                    </td>
                </tr> -->
               </tbody>
          </table>
    
      </div>
    </section>

  </main><!-- End #main -->

<?php include("./components/footer.php")?>