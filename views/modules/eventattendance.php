<!-- partial -->
<div class="overlay">
      <div class='loader'></div>
    </div>
<div class="page-content p-0 m-0" >

  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Attendance</a></li>
      <li class="breadcrumb-item active" aria-current="page">Events</li>
    </ol>
  </nav>
  <form role="form" method="POST" id="attendance">

    <div class="row pb-5">
      <div class="col-sm-3 form-group">
          <label for="sdate">Date</label>
          <input type="text" id="sdate" class="form-control sdate" name="sdate"  value="" style="font-size: 1.5em" readonly>
      </div>                   

      <div class="col-sm-3 form-group"  >
          <label for="stime">Time</label>
          <input type="text" id="stime" class="form-control" name="stime" value="" style="font-size: 1.5em" readonly>
      </div>

      <div class="col-sm-1 form-group ml-5"  display="inline" style="margin-left:2em; margin-top: -.35em;">
              <label for="txt-category" class="form-label">Category</label>
              <select class="form-select" id="attendanceType" name="attendanceType"  style="width:10em; font-size:1.45em;">
                  <!-- <option value="" selected hidden></option> -->
                  <option value="">ALL</option>
                  <option value="JKIDS">JKIDS</option>
                  <option value="HYPE">HYPE</option>
                  <option value="KAYA">KAYA</option>
                  <option value="ADULTS">ADULTS</option>
                  <option value="KC">KC</option>
              </select>
        </div>

      <div class="col-sm-2 form-group " style="margin-left: 20em;">
          <button type="button" class="btn btn-danger btn-rounded " style="margin-top: 20px; height: 3.5em;width:10em;font-size: 1.1em; " name="clearAttendance" id="clearAttendance"><i class="fa fa-eraser" style="font-size:1.2em; "></i> <span style="font-size:1.2em; ">&nbsp;Clear</span> </button>
      </div>

      <div class="col-sm-1 form-group " style="margin-left: -5em;">
          <button type="submit" class="btn btn-success btn-rounded px-4 " style="margin-top: 20px; height: 3.5em;width:10em;font-size: 1.1em; " name="attendanceSave" id="attendanceSave"><i class="fa fa-save" style="font-size:1.2em; "></i> <span  style="font-size:1.2em; ">&nbsp;Save</span> </button>
      </div>
    </div>


    
    

    <input type="hidden" name="attendanceList" id="attendanceList">
    <input type="hidden" name="attendanceType" id="attendanceType" >

    <!-- <div class="lds-facebook"><div></div><div></div><div></div></div> -->
  
    

    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">Attendance Sheet</h6>

        
    
            
              <div class="table-responsive">

                <table id="ScrolldataTableMember" class="table table-hover datatable-medium-font profile-grid-header eventattendeeTable" style="font-size: 1.2em" data-paging='false'>
                  <thead>
                    <tr>
                      <th>MemberID</th>
                      <th>Name</th>
                      <th>Category</th>
                      <th>Attendance</th>
                      <th hidden>Email</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $attendee = (new ControllerAttendee)->ctrShowAttendeeList();
                      foreach ($attendee as $key => $value) {
                        echo '<tr style="height: 5em;">
                                <td style="vertical-align:middle">'.$value["memID"].'</td>
                                <td style="vertical-align:middle">'.$value["fullname"].'</td>
                                <td style="vertical-align:middle">'.$value["category"].'</td>
                                <td style="text-align:center; vertical-align:middle"> <input type="checkbox" style="height: 3em;width:3em;" class= "form-check-input" id="num-isactive" name="skill_check" value="1" />
                                <td style="vertical-align:middle" hidden>'.$value["email"].'</td>
                                <label for="num-isactive"></label> </td>
                              </tr>';
                        }
                    ?>
                  </tbody>
                </table>

              </div>

          </div>
        </div>
      </div>
    </div>
  </form>
</div>

