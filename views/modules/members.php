<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Members</a></li>
        <li class="breadcrumb-item active" aria-current="page">Members Information</li>
    </ol>
</nav>

<div class="row">
    <div class="col-lg-12">
        <form role="form" id="members-form" method="POST" autocomplete="nope">
            <div class="card">
                <div class="card-body">
                            <input type="text" name="trans_type" id="trans_type" value="New" style="display:none;" required>

                            <div class="row mb-3">
                                <div class="col-md-8"></div>

                                <div class="col-md-2 form-group ">
                                    <label for="memID" class="form-label">ID</label>
                                    <input id="memID" class="form-control" name="memID" type="text" readonly>
                                </div>

                                <div class="col-md-2 form-group">
                                    <label for="txt-cstats" class="form-label">Status</label>
                                    <select class="form-select" id="txt-cstats" name="txt-cstats" required>
                                            <option value="Regular">Regular</option>
                                            <option value="Irregular">Irregular</option>
                                    </select>
                                </div>

                            </div>

                            <div class="border border-dark rounded p-3 shadow mb-5">

                                <div class="row mb-auto">
                                <h6 class="mb-3 ">BASIC INFORMATION</h6>    
                                
                            

                                    <div class="col-sm-3 form-group pt-3">
                                        <label for="fname" class="form-label">First Name</label>
                                        <input id="tns-fname" class="form-control" name="name" type="text" placeholder="Enter First Name"  autocomplete="nope" required>
                                    </div>

                                    <div class="col-sm-3 form-group pt-3">
                                        <label for="tns-mname" class="form-label">Middle Name</label>
                                        <input id="tns-mname" class="form-control" name="name" type="text" placeholder="Enter Middle Name"  autocomplete="nope"  >
                                    </div>

                                    <div class="col-sm-3 form-group pt-3">
                                        <label for="tns-lname" class="form-label">Last Name</label>
                                        <input id="tns-lname" class="form-control" name="name" type="text" placeholder="Enter Last Name"  autocomplete="nope" >
                                    </div>

                                    <div class="col-sm-1 form-group pt-3">
                                        <label for="txt-suffix" class="form-label">Suffix</label>
                                        <select class="form-select" id="txt-suffix" name="txt-suffix">
                                            <option value="" selected hidden></option>
                                            <option value="jr">Jr</option>
                                            <option value="sr">Sr</option>
                                            <option value="III">III</option>
                                            <option value="N/A">N/A</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-2 form-group pt-3">
                                            <label for="txt-gender" class="form-label">Gender</label>
                                            <select class="form-select" id="txt-gender" name="txt-gender">
                                                <option value="" selected hidden></option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                    </div>

                                </div>

                                <div class="row mb-3 pt-4">

                                    <div class="col-sm-4 form-group pt-3 ">
                                        <label for="txt-dob" class="form-label">Date of Birth</label>
                                        <div class="input-group flatpickr" id="flatpickr-date">
                                            <input type="text" class="form-control" name="txt-dob" id="txt-dob" placeholder="Select date" data-input>
                                            <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>
                                        </div>  
                                    </div>

                        

                                    <div class="col-sm form-group pt-3">
                                        <label for="txt-civilstats" class="form-label">Status</label>
                                        <select class="form-select" id="txt-civilstats" name="txt-civilstats">
                                            <option value="" selected hidden></option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                        </select>
                                    </div>


                                    <div class="col-sm form-group pt-3">
                                        <label for="txt-category" class="form-label">Category</label>
                                        <select class="form-select" id="txt-category" name="txt-category" required>
                                            <option value="" selected hidden></option>
                                            <option value="JKIDS">JKIDS</option>
                                            <option value="HYPE">HYPE</option>
                                            <option value="KAYA">KAYA</option>
                                            <option value="ADULTS">ADULTS</option>
                                            <option value="KC">KC</option>
                                        </select>
                                    </div>
                                    

                                    
                                    <div class="col-sm form-group pt-3">
                                        <label for="txt-branch" class="form-label">Branch</label>
                                        <select class="form-select" id="txt-branch" name="txt-branch">
                                            <option value="HERNARES">HERNARES</option>
                                            <option value="AKLAN">AKLAN</option>
                                            <option value="SILAY">SILAY</option>
                                            <option value="TALISAY">TALISAY</option>
                                            <option value="SAGAY">SAGAY</option>
                                            <option value="ALIJIS">ALIJIS   </option>
                                            <option value="POTOTAN">POTOTAN</option>
                                            <option value="SIPALAY">SIPALAY</option>
                                        </select>
                                    </div>

                                </div>

                            </div>


                          <div class="border border-dark rounded p-3 shadow mb-3">
                                <div class="row mb-3">        
                                <h6 class="mb-3">CONTACT INFORMATION</h6>

                                    <div class="col-sm-4 form-group pt-3 " style="margin: right 10em;;">
                                        <label for="tns-email" class="form-label">Email</label>
                                        <input id="tns-email" class="form-control" name="tns-email" type="text" placeholder="Enter Email"  autocomplete="nope" >
                                    </div>

                                    <div class="col-sm-3 form-group pt-3">
                                        <label for="num-phone" class="form-label">Mobile Number</label>
                                        <input id="num-phone" class="form-control" name="num-phone" type="text" placeholder="Enter Mobile Number"  autocomplete="nope" >
                                    </div>

                                </div>
                            </div>
                        
                </div><!-- end card body-->

                <div class="card-footer">
                    <div class="row">
                        <div class="col"></div>
                            <div class="col-auto">
                                <div class="float-sm-right">

                                    <button type="button" class="btn btn-danger btn-rounded px-4" id="btn-new"><i class="fa fa-file"></i>&nbsp;&nbsp;New</button>

                                    <button type="submit" class="btn btn-primary btn-rounded px-4"><i class="fa fa-save"></i>&nbsp;&nbsp;Save</button>
      
                                    <button type="button" class="btn btn-secondary btn-rounded px-4" id="btn-search" data-bs-toggle="modal" data-bs-target="#modal-search-member"><i class="fa fa-search"></i> Search</button>  

                                        
                                </div>
                            </div> 
                        </div>
                </div> <!-- end footer -->

            </div><!-- end card-->
        </form>
    </div>    
</div>



<!-- MODAL -->

<!-- Modal -->
<div class="modal fade" id="modal-search-member" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">MEMBERS LIST</h5>
        
        <select class="form-select" id="new-category" style="margin-left:25em; width:12em;" name="new-category">
                <option value="">ALL</option>
                <option value="JKIDS">JKIDS</option>
                <option value="HYPE">HYPE</option>
                <option value="KAYA">KAYA</option>
                <option value="ADULTS">ADULTS</option>
                <option value="KC">KC</option>
            </select>

        <button type="button" class="btn btn-success btn-rounded" style="margin-left:2em;" id="btn-print-members"><i class="fa fa-print"></i>&nbsp;&nbsp;Print</button>  
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>


      <div class="modal-body">
        <table class="table table-hover  datatable-small-font profile-grid-header membersTable" width="100%" >
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Category</th>
                    <th>Status</th>

              
                    </tr>
                </thead>
        </table>
      </div>



    </div>
  </div>
</div>

    


