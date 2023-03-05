<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">User Accounts</a></li>
        <li class="breadcrumb-item active" aria-current="page">Accounts Information</li>
    </ol>
</nav>

<div class="row">
    <div class="col-lg-12">
        <form role="form" id="accounts-form" method="POST" autocomplete="nope" class="accountsForm">
            <div class="card">
                <div class="card-body">
                            <input type="text" name="trans_type" id="trans_type" value="New" style="display:none;" required>

                            <div class="border border-dark rounded  shadow mb-5" style="padding-top:2em; padding-bottom:2em; padding-left:3em; font-size:1.3em; ">
                                <h6 class="mb-3" style="font-size:1.3em;"> BASIC INFORMATION</h6>

                                <div class="row mb-auto">

                                     <div class="col-md-2 form-group pt-3 pr-3" style="margin-right:10em;">
                                            <label for="accID" class="form-label">ID</label>
                                            <input id="accID" class="form-control" name="accID" type="text" style="font-size:1em;"readonly >
                                    </div>

                                    <div class="col-sm-3 form-group pt-3" style="margin-right:20em;">
                                        <label for="username" class="form-label">Username</label>
                                        <input id="tns-username" class="form-control" name="username" type="text" placeholder="Enter Username"  autocomplete="nope" style="font-size:1em; width:30em;" required>
                                    </div>

                                   


                                    <div class="col-sm-2 form-group pt-3">
                                            <label for="txt-access" class="form-label">Access Level</label>
                                            <select class="form-select" id="txt-access" name="txt-access" style="font-size:1em;">
                                                <option value="" selected hidden></option>
                                                <option value="user">User</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                    </div>

                                </div>

                                    
                                <div class="row mb-auto pt-5"  > 
                                    <div class="col-sm-2 form-group " style="margin-right:10em;">
                                        <label for="tns-password" class="form-label">Password</label>
                                        <input id="tns-password" class="form-control" name="password" type="text" placeholder="Enter Password"  autocomplete="nope" style="font-size:1em; width:20em;">
                                    </div>
                                    
                                    <div class="col-sm-2 form-group "  style="padding-top:2em; ">
                                        <input id="tns-repassword" class="form-control" name="confirm_password" type="text" placeholder="Re-Enter Password"  autocomplete="nope" style="font-size:1em; width:20em;">
                                    </div>
                            

                                </div>

                            </div>

                            
                          <div class="border border-dark rounded shadow mb-3 " style="padding-top:2em; padding-bottom:2em; padding-left:3em; font-size:1.3em; ">
                                <div class="row mb-3">        
                                <h6 class="mb-3" style="font-size:1.3em;">CONTACT INFORMATION</h6>

                                    <div class="col-sm-4 form-group pt-3" style="margin-right:20em;">
                                        <label for="tns-name" class="form-label">Name</label>
                                        <input id="tns-name" class="form-control" name="name" type="text" placeholder="Enter Name"  autocomplete="nope" style="font-size:1em; width:40em;">
                                    </div>

                                    <div class="col-sm-3 form-group pt-3">
                                        <label for="num-phone" class="form-label">Mobile Number</label>
                                        <input id="num-phone" class="form-control" name="phone" type="text" placeholder="Enter Mobile Number"  autocomplete="nope" style="font-size:1em; width:20em;">
                                    </div>

                                </div>
                            </div>
                        
                </div><!-- end card body-->

                <div class="card-footer">
                    <div class="row">
                        <div class="col"></div>
                            <div class="col-auto">
                                <div class="float-sm-right">

                                    <button type="button" class="btn btn-danger btn-rounded px-4" id="abtn-new"><i class="fa fa-file"></i>&nbsp;&nbsp;New</button>

                                    <button type="submit" class="btn btn-primary btn-rounded px-4"><i class="fa fa-save"></i>&nbsp;&nbsp;Save</button>
      
                                    <button type="button" class="btn btn-secondary btn-rounded px-4" id="btn-search" data-bs-toggle="modal" data-bs-target="#modal-search-accounts"><i class="fa fa-search"></i> Search</button>  
                                </div>
                            </div> 
                        </div>
                </div> <!-- end footer -->

            </div><!-- end card-->
        </form>
    </div>    
</div>




<!-- Modal -->
<div class="modal fade" id="modal-search-accounts" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ACCOUNTS LIST</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>


      <div class="modal-body">
        <table class="table table-hover  datatable-small-font profile-grid-header accountsTable" width="100%" >
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>USERNAME</th>
                    <th>ACCESS</th>
                    <th>NAME</th>
                    <th>PHONE</th>
              
                    </tr>
                </thead>
        </table>
      </div>



    </div>
  </div>
</div>

    

