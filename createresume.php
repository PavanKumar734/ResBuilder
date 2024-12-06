<?php
$title="Create Resume| Resume Builder";
require "./Asset/includes/header.php";
require "./Asset/includes/navbar.php";
$fn->AuthPage(); //Accessed only if user is Authed.
?>



    <div class="container">

        <div class="bg-white rounded shadow p-2 mt-4" style="min-height:80vh">
            <div class="d-flex justify-content-between border-bottom">
                <h5>Create Resume</h5>
                <div>
                <a class="text-decoration-none" onclick='history.back()'><i class="bi bi-arrow-left-circle"></i> Back</a>
                </div>
            </div>

            <div>

                <form action="actions/createresume.action.php" method="post" class="row g-3 p-3">
                <div class="col-md-6">
                        <label class="form-label">Resume Title</label>
                        <input type="text" name="resume_title" placeholder="Web developer consultant" value="resume.<?=time()?>" class="form-control" required>
                    </div>

                <h5 class="mt-3 text-secondary"><i class="bi bi-person-badge"></i> Personal Information</h5>
                    <div class="col-md-6">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="full_name" placeholder="Dev Ninja" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email_id" placeholder="dev@abc.com" class="form-control" required>
                    </div>

                    <div class="col-12">
                        <label for="inputAddress" class="form-label"> Objective</label>
                        <textarea class="form-control" name="objective"></textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Mobile No</label>
                        <input type="number" min="1111111111" name="mobile_no" placeholder="9569569569" max="9999999999"
                            class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Date Of Birth</label>
                        <input type="date" name="dob" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Gender</label>
                        <select class="form-select" name="gender">
                            <option>Male</option>
                            <option>Female</option>
                            <option>Transgender</option>




                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Religion</label>
                        <select class="form-select" name="religion">
                            <option>Hindu</option>
                            <option>Muslim</option>
                            <option>Sikh</option>
                            <option>Christian</option>



                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Nationality</label>
                        <select class="form-select" name="nationality">
                            <option>Indian</option>
                            <option>Non Indian</option>


                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Marital Status</label>
                        <select class="form-select" name="marital_status">
                            <option>Married</option>
                            <option>Single</option>
                            <option>Divorced</option>

                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Hobbies</label>
                        <input type="text" name="hobbies" placeholder="Reading Books, Watching Movies" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Languages Known</label>
                        <input type="text" name="languages" placeholder="Hindi,English" class="form-control" required>
                    </div>

                    <div class="col-12">
                        <label for="inputAddress" class="form-label"> Address</label>
                        <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St" required>
                    </div>



                  

                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Add
                            Resume</button>
                    </div>
                </form>
            </div>





        </div>

    </div>

                  <!-- modal exp-->
                  <div class="modal fade" id="addexp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Experience</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

    
      <div class="modal-body">
      
      <form method="post" action="actions/addexperience.action.php" class="row g-3">
  <div class="col-12">
    <label for="inputEmail4" class="form-label">Position / Job Role</label>
    <input type="text" class="form-control" id="inputEmail4" name="position" placeholder="Web Developer Consultant (2+ Years)" required>
  </div>
  <div class="col-12">
    <label for="inputPassword4" class="form-label">Company</label>
    <input type="text" class="form-control" id="inputPassword4" name="company" placeholder=" Dominos,New Delhi " required>
  </div>

  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Joined</label>
    <input type="text" name="started" placeholder="October 2021" class="form-control" id="inputPassword4" required>
  </div>

  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Resigned</label>
    <input type="text" name="ended" class="form-control" placeholder="Currently Pursuing" id="inputPassword4" required>
  </div>

  <div class="col-12">
  <label for="inputPassword4" class="form-label">Job Description</label>
   <textarea class="form-control" name="job_desc" required></textarea>
  </div>

  

 
  <div class="col-12 text-end">
    <button type="submit" class="btn btn-primary">Add Experience</button>
  </div>
</form>


      </div>
      
    </div>
  </div>
</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>