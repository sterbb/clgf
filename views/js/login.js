$(function() {

  // broadcast that you are opening a page
  localStorage.openpages = Date.now();
  // runs only when another tab has been opened or change

  window.addEventListener('storage', function(e){
    if(e.key == "openpages"){
      //if anybody is opening the same page
      this.localStorage.page_available = Date.now();
    }
    // if another 
    if(e.key == "page_available"){
      Swal.fire({
        icon: 'error',
        title: 'ANOTHER TAB IS ALREADY OPENED!',
        text: 'PLEASE CLOSE THIS TAB TO PROCEED'
      }).then(function(result) {
        window.open(location, '_self');
      });;

          }
  },false);

  dateTime(); 
  currentDate();
    $(function() {
      // validate signup form on keyup and submit
      $(".loginForm").validate({  
        rules: {
          name: {
            required: true,
            minlength: 3
          },
          email: {
            required: true,
            email: true
          },
          age_select: {
            required: true
          },
          gender_radio: {
            required: true
          },
          skill_check: {
            required: true
          },
          username:{
            required: true,
            minlength: 3
          },
          password: {
            required: true,
            minlength: 5
          },
          confirm_password: {
            required: true,
            minlength: 5,
            equalTo: "#password"
          },
          terms_agree: "required"
        },
        messages: {
          name: {
            required: "Please enter a name",
            minlength: "Name must consist of at least 3 characters"
          },
          email: "Please enter a valid email address",
          age_select: "Please select your age",
          skill_check: "Please select your skills",
          gender_radio: "Please select your gender",
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
          },
          username:{
            required: "Please provide a username",
            minlength: "Your username must be at least 3 characters long"
          },
          confirm_password: {
            required: "Please confirm your password",
            minlength: "Your password must be at least 5 characters long",
            equalTo: "Please enter the same password as above"
          },
          terms_agree: "Please agree to terms and conditions"
        },
        errorPlacement: function(error, element) {
          error.addClass( "invalid-feedback" );
  
          if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
          }
          else if (element.prop('type') === 'radio' && element.parent('.radio-inline').length) {
            error.insertAfter(element.parent().parent());
          }
          else if (element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
            error.appendTo(element.parent().parent());
          }
          else {
            error.insertAfter(element);
          }
        },
        highlight: function(element, errorClass) {
          if ($(element).prop('type') != 'checkbox' && $(element).prop('type') != 'radio') {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
          }
        },
        unhighlight: function(element, errorClass) {
          if ($(element).prop('type') != 'checkbox' && $(element).prop('type') != 'radio') {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
          }
        }
      });
    });

    //login
     $(".loginForm").submit(function(e) {
        e.preventDefault();

      //   var response = grecaptcha.getResponse();
      //  if(response.length == 0){

      //     $("#error").css("visibility","visible");
      //     $("#errorMessage").text("Please verify you are not a robot");
      //     return false;
      //  } else{

          // if($(".loginForm").valid()){
          //   e.preventDefault();

            
            var username = $("#username").val();
            var password = $("#password").val();


            var account = new FormData();
            account.append("username", username);
            account.append("password", password);


            $.ajax({
                url: "ajax/login_authenticate_account.ajax.php",
                method: "POST",
                data: account,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "text",
                success: function(answer) {
                  if(answer == "errornull"){
                    $("#error").css("visibility","visible");
                    $("#errorMessage").text("Account not found. Please try again");
                    e.preventDefault;
                  }else{
                    window.location.href='members';
                  }
               
               
                },
                error: function() {
                    alert("Oops. Something went wrong!");
                },
                complete: function() {
                }
            });
           
      

    //    }
    });

    function dateTime(){
      const myInterval = setInterval(myTimer, 1000);

    }
    
  function myTimer() {
      const date = new Date();
      $('#login_time').text(date.toLocaleTimeString());
  }

  function currentDate(){
    var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    let dtoday = new Date().toLocaleDateString('en-US', {month: 'long', year:'numeric', day:'numeric'});
    let d = new Date();
    $("#login_date").text(dtoday+" ");
    $("#login_day").text(days[d.getDay()] + ", ");

  }

  function getMacAddress(){
    var macAddress = "";
    var ipAddress = "";
    var computerName = "";
    var wmi = GetObject("winmgmts:{impersonationLevel=impersonate}");
    e = new Enumerator(wmi.ExecQuery("SELECT * FROM Win32_NetworkAdapterConfiguration WHERE IPEnabled = True"));
    for(; !e.atEnd(); e.moveNext()) {
        var s = e.item();
        macAddress = s.MACAddress;
        ipAddress = s.IPAddress(0);
        computerName = s.DNSHostName;
    }

    
  
    $("#errorMessage").val(macAddress);
  
  
  }

  });

