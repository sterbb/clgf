<?php 

if(isset($_SESSION["name"])){
    header("location: javascript://history.go(-1)");
}

?>
<?php 

if(isset($_SESSION["name"])){
    header("location: javascript://history.go(-1)");
}

?>
<div class="container h-100">
    <div class="d-flex justify-content-center h-100">
        
        <div class="user_card">
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <img src="views/img/logo_circle.png" class="brand_logo" alt="Christ Living God Fellowship logo">
                </div>
            </div>  
            <div class="d-flex justify-content-center form_container"style="padding-top:1em;">
                <form class="loginForm">
                    <div class="input-group mb-3" style="padding-top:1em;">
                        <div class="input-group-append" >
                            <span class="input-group-text"style="font-size:2em;"><i class="fa fa-user"></i></span>                   
                        </div>
                        <input type="text" name="username" id="username" class="form-control"  required>
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text" style="font-size:2em;"><i class="fa fa-key"></i></span>                    
                        </div>
                        <input type="password" class="form-control" name="password" id="password" autocomplete="off" required>
                    </div>

                
            </div>
                <div class="d-flex justify-content-center mt-1 login_container"  style="padding-top:-1.5em;">
                    <button type="submit" value="Submit" name="button" id="login" class="btn login_btn" style="font-size:1.5em; margin-top:1em;">LOGIN</button> 
                </div>
                </form>
            <div id="error" class="d-flex justify-content-center mb-5 errorLogin" style="visibility:hidden;">
            <h4 id="errorMessage"></h4>
            </div>
        </div>
    </div>
</div>

<em>
<p id='head1' class='header'><em>Therefore go and make disciples of all nations, <br /> baptizing them in the name of the Father and of the Son <br />and of the Holy Spirit, <br />and teaching them to obey everything  <br /> I have commanded you. <br />And surely I am with you always, <br />to the very end of the age.”</em>  <br /><sub>Matthew 28:19-20</sub></p>
<p id='head2' class='header'><em>Whatever you do, work at it with all your heart, <br />as working for the Lord, not for human masters</em> <br /><sub>Colossians 3:23</sub></p>
<p id='head3' class='header'><em>Finally, brothers and sisters,<br /> whatever is true, whatever is noble, whatever is right,whatever is pure, <br /> whatever is lovely, whatever is admirable—if anything <br />is excellent or praiseworthy—think about such things.</em> <br /><sub>Philippians 4:8</sub></p>
<p id='head4' class='header'><em>And we know that in all things God works for the good of those who love him, who have been called according to his purpose.</em>  <br /><sub>Romans 8:28</sub></p>
<p id='head5' class='header'>Welcome to<br id='head6'><b>Christ The Living God Fellowship</b> <br /><sub id="login_day"></sub><sub id="login_date"></sub>&nbsp;<sub id="login_time"></sub></p>
  <div class='light x1'></div>
  <div class='light x2'></div>
  <div class='light x3'></div>
  <div class='light x4'></div>
  <div class='light x5'></div>
  <div class='light x6'></div>
  <div class='light x7'></div>
  <div class='light x8'></div>
  <div class='light x9'></div>