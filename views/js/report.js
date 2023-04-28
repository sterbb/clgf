$(function() {

    $("#report-range, #check-adult, #check-hype, #check-jkids, #check-kaya").change(function(){

        var date1 = "";
        var date2 = "";
        var daterange = $("#report-range").val();
        if(daterange.length <= 10){
            date1=daterange.substring(0,10).split("-").reverse().join("-");

        }else{
            date1=daterange.substring(0,10).split("-").reverse().join("-");
            date2=daterange.substring(14,24).split("-").reverse().join("-");
        }


        var adult = $('#check-adult').is(':checked'); 
        var hype = $('#check-hype').is(':checked'); 
        var jkids = $('#check-jkids').is(':checked'); 
        var kaya = $('#check-kaya').is(':checked'); 

        var attdata = new FormData();
        attdata.append("date1", date1);
        attdata.append("date2", date2);
        attdata.append("adult", adult.toString());
        attdata.append("hype", hype.toString());
        attdata.append("jkids", jkids.toString());
        attdata.append("kaya", kaya.toString());

    
        


        $.ajax({
            url:"ajax/attendance_report.ajax.php",
            method: "POST",
            data: attdata,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(answer) {
                console.log(answer);
                alert(JSON.stringify(answer));

                $(".report_preview").empty();
                var html = [];

                html.push("<div class = 'table-responsive' style='overflow-y; auto: max-height: 470;'>");

                    
                for(var i = 0; i <answer.length; i++){
                
                        html.push('<h4 class="py-3">'+  answer[i][ (answer[i].length) -1]+ '  (' + answer[i][(answer[i].length) -2]+')</h4>');
                        html.push('<table class="table mx-auto w-auto border border-2">');
                            html.push("<thead class='border border-2'>");
                                html.push("<tr>");
                                    html.push("<th class='table_head_left_fixed border border-2'>NAME</th>");
                                    html.push("<th class='table_head_left_fixed border border-2'>CATEGORY</th>");
                                html.push("</tr>");
                            html.push("</thead>");

                            for(var i2 = 0; i2 <answer[i].length -2; i2++){
                                html.push('<tr class="border border-2">');
                                 html.push('<td class="border border-2">'+ answer[i][i2][1]+'</td>')
                                 html.push('<td class="border border-2">'+ answer[i][i2][3]+'</td>')
                                html.push('</tr>');
                            }

    
                          
                }
                   
                    html.push("</table>");
                html.push("</div>");


                $(".report_preview").html(html);




            },
            error: function() {

            },
            complete: function(answer) {
              
        
       
            }

        });
 

    });

    $("#btn-print-attendance").click(function(){
        var prange = $("#report-range").val();

        var pdate1 = "";
        var pdate2 = "";
        if(prange.length <= 10){
            pdate1=prange.substring(0,10).split("-").reverse().join("-");

        }else{
            pdate1=prange.substring(0,10).split("-").reverse().join("-");
            pdate2=prange.substring(14,24).split("-").reverse().join("-");
        }
        var padult =  $('#check-adult').is(':checked'); 
        var phype =  $("#check-hype").is(':checked'); 
        var pjkids =  $("#check-jkids").is(':checked'); 
        var pkaya =  $("#check-kaya").is(':checked'); 

        alert(pdate1);
        alert(pdate2);
        

    
        document.cookie = 'pdate1 ='+ pdate1;
        document.cookie = 'pdate2 ='+ pdate2;
        document.cookie = 'padult ='+ padult;
        document.cookie = 'phype ='+ phype;
        document.cookie = 'pjkids ='+ pjkids;
        document.cookie = 'pkaya ='+ pkaya;


    });



});