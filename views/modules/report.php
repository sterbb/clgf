<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Report</a></li>
        <li class="breadcrumb-item active" aria-current="page">Attendance Report</li>
    </ol>
</nav>

<div class="row">
    <div class="col-6">
        Time and Date
    </div>
    <div class="col-6">
        <div class="row justify-content-around align-items-center">
            <div class="col-4">

            </div>

            <div class="col-4">
            <label for="flatpickr-range"  class="form-label">Date</label>
                <input class="form-control flatpickr" type="text" placeholder="Select Dates.." id="report-range">
            </div>
        </div>


        <div class="row justify-content-around align-items-center pt-4"> 


            <div class="col-2 form-group pt-1 ">
                <label for="check-adult" class="form-label pt-3">ADULT</label>
                 <input type="checkbox" style="height: 3em;width:3em;" class= "form-check-input" id="check-adult" name="check-adult" value="1" />
            </div>

            <div class="col-2 form-group pt-1"> 
                <label for="check-hype" class="form-label pt-3">HYPE</label>
                 <input type="checkbox" style="height: 3em;width:3em;" class= "form-check-input" id="check-hype" name="check-hype" value="1" />
            </div>

            <div class="col-2 form-group pt-1">
                <label for="check-jkids" class="form-label pt-3">JKIDS</label>
                 <input type="checkbox" style="height: 3em;width:3em;" class= "form-check-input" id="check-jkids" name="check-jkids" value="1" />
            </div>

            <div class="col-2 form-group pt-1">
                <label for="check-kaya" class="form-label pt-3">KAYA</label>
                 <input type="checkbox" style="height: 3em;width:3em;" class= "form-check-input" id="check-kaya" name="check-kaya" value="1" />
            </div>
        </div>
        
    </div>
</div>

<div class="border border-7 mt-4 px-5 report_preview" >

   
</div>

<button type="button" class="btn btn-primary btn-rounded px-4" id="btn-print-attendance"><i class="fa fa-save"></i>&nbsp;&nbsp;PRINT</button>