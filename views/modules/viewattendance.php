<!-- partial -->

<div class="page-content p-0 m-0" >

  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Attendance</a></li>
      <li class="breadcrumb-item active" aria-current="page">View Attendance</li>
    </ol>
  </nav>
  <form role="form" method="POST" id="viewattendance">

    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">Attendance Sheet</h6>
            
              <div class="table-responsive">

                <table id="dataTableMember" class="table table-hover datatable-medium-font profile-grid-header ShwattendeeTable" style="font-size: 1.2em">
                  <thead>
                    <tr>
                      <th>Attendance ID</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Type</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $attendance = (new ControllerAttendance)->ctrShowAttendanceList();
                      foreach ($attendance as $key => $value) {
                        echo '<tr style="height: 5em;">
                                <td style="vertical-align:middle">'.$value["attendanceid"].'</td>
                                <td style="vertical-align:middle">'.$value["sdate"].'</td>
                                <td style="vertical-align:middle">'.$value["stime"].'</td>
                                <td style="vertical-align:middle">'.$value["stype"].'</td>
                                <td style="text-align:center; vertical-align:middle"> <button type="button" class="btn btn-secondary btn-rounded px-4" id="btn-search" data-bs-toggle="modal" data-bs-target="#modal-search-member"><i class="fa fa-search"></i> View</button>  
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


<!-- Modal -->
<div class="modal fade" id="modal-search-member" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ATTENDEES</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>


      <div class="modal-body">
        <table class="table table-hover  datatable-small-font profile-grid-header cur_attendeeTable" width="100%" >
                <thead>
                    <tr>
                    <th>Name</th>
                    <th>Category</th>
                    </tr>
                </thead>
        </table>
      </div>



    </div>
  </div>
</div>

