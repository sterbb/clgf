//display list of attendees
if (!$.fn.DataTable.isDataTable('.cur_attendeeTable')) {
    var ml = $('.cur_attendeeTable').DataTable({
        "ajax": "ajax/attendee_list2.ajax.php",
        "deferRender": true,
        "retrieve": true,
        "paging": true,
        "processing": true,
        "language": {
            'loadingRecords': 'Loading Member Records...',
            'zeroRecords': 'No records to display',
            "info": "Showing page _PAGE_ of _PAGES_"
        },

    });
}



$(function() {
    dateTime();
    currentDate();

    function dateTime(){
        const myInterval = setInterval(myTimer, 1000);
      }
      
    function myTimer() {
        const date = new Date();
        $('#stime').val(date.toLocaleTimeString());
    }

    function currentDate(){
        let dtoday = new Date().toLocaleDateString();
        $("#sdate").val(dtoday);
    }

    //adding of attendance
    $("#attendance").submit(function(e){
        e.preventDefault();
        addAttendance();
      
    });


    //add atendanc

    function addAttendance(){
        swal.fire({
            title: 'Do you want to add this Attendance',
            icon: 'question',
            text: "Do you want to add this Attendance",
            type: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes, Save it!',
            cancelButtonText: 'Cancel!',
            confirmButtonClass: 'btn btn-outline-success',
            cancelButtonClass: 'btn btn-outline-danger',
            allowOutsideClick: false,
            buttonsStyling: false
        }).then(function(result) {
            if (result.value) {
                GetCellValues();
    
                var stime = new Date().toLocaleTimeString();
                var date = new Date().toLocaleDateString();
                var [mm, dd, yy] = date.split("/");
                var today = [yy, mm, dd].join('-');
                var sdate = today;
                var attendancelist = $("#attendanceList").val();
                var type = $("#attendanceType").val();
        
                var attendance = new FormData();
                attendance.append("stime",stime);
                attendance.append("sdate",sdate);
                attendance.append("attendancelist",attendancelist);
                attendance.append("type",type);
            


                $.ajax({
                    url:"ajax/attendance_save_record.ajax.php",
                    method: "POST",
                    data: attendance,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType:"text",
                    beforeSend: function() {
                        //begin spinner
                        $('.overlay').show();
                     },
                    success: function(answer) {
                       
                    },
                    error: function() {
                        alert("Oops. Something went wrong!");
                    },
                    complete: function() {

                    }
                })

                //sending emails if member is absent
                $.ajax({
                    url:"models/sendEmail.php",
                    method: "POST",
                    data: attendance,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType:"text",
                    success: function(answer) {
                       
                    },
                    error: function() {
                        alert("Oops. Something went wrong!");
                    },
                    complete: function() {
                        //end spinner
                        $('.overlay').hide();
                        swal.fire({
                            icon: 'success',
                            title: 'Attendance successfully saved!',
                            type: 'success',
                            confirmButtonText: 'Got it!',
                            confirmButtonClass: 'btn btn-outline-success',
                            allowOutsideClick: false,
                            buttonsStyling: false
                        }).then(function(result) {
                            if (result.value) {

                            }
                        })
                    }
                })

                clear();

                
            }
        });
    }

        

    //for listing the attendees in a specific date
    $(".ShwattendeeTable tbody").on('click', 'button', function(){
       
        var aid = $(this).closest('tr').find('td:eq(0)').text();

        document.cookie = 'aid ='+aid;

        var table = $('.cur_attendeeTable').DataTable();

        table.ajax.reload();
        
    });



    //get values on fellowship datatable
    function GetCellValues() {

        var arrData=[];
        $(".attendeeTable tr, .eventattendeeTable tr").each(function(){
            var currentRow=$(this);

        var col1_value=currentRow.find("td:eq(0)").text();
        var col2_value=currentRow.find("td:eq(1)").text();
        var col3_value=currentRow.find("td:eq(2)").text();
        var col4_value=currentRow.find("td:eq(3)").children().is(":checked");
        var col5_value=currentRow.find("td:eq(4)").text();

        var obj = {};
        obj.memID = col1_value;
        obj.name = col2_value;
        obj.category = col3_value;
        obj.attendance = col4_value;
        obj.email = col5_value;
        arrData.push(obj);
  

        });
        //removing excess object
        arrData.shift();
        arrData.shift();
    
        $("#attendanceList").val(JSON.stringify(arrData));
    }



    $('#attendanceType').on('change',function(){
        var table = $('.eventattendeeTable').DataTable();
        //var selectedValue = $('#attendanceType').val();
        table.column(2).search($(this).val()).draw();
    });

    // function keys
    document.addEventListener("keydown", e => {
        if( e.key.toLowerCase() === 's' && e.shiftKey ){
            addAttendance();
        } else if (e.key.toLowerCase() === 'c' && e.shiftKey) {;
            clear();
        }
    });

    $('#clearAttendance').on('click',function(e){
        clear();
    });

    function clear(){
        var table = $('.attendeeTable').DataTable();
        $('input[type="checkbox"]', table.cells().nodes()).prop('checked',false);

        var table2 = $('.eventattendeeTable').DataTable();  
        $('input[type="checkbox"]', table2.cells().nodes()).prop('checked',false);

     
    }



    
});

