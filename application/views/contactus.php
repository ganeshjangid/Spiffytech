<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Spiffy Tech | Contact Us</title>
        <meta description="Please contact us with any questions : 1404, Tricity Pristine, sector 10, Kharghar , Navi Mumbai">
        <script type="text/javascript" src="<?php echo base_url(); ?>asserts/js/jquery-1.11.0.min.js"></script> 
        <script>
            $("#contact").addClass("active");
        </script>
    </head>
    <style>
        h4 {
            font-size: 23px;
        }

        .captcha_div{text-align :right;}
        .class_buttom{text-align:left;}
        .g-recaptcha div{height:auto !important;width: auto !important; }
        @media screen and (max-width:1170px)
        {
            .class_buttom{text-align:center;} 
            .captcha_div{text-align :center;}
        }                

    </style>
    <!--header end--> 
    <!--slider start-->

    <div data-ride="carousel"> 
        <!-- Indicators -->
        <div class="hs_page_title">
            <div class="container">
                <!--<marquee>
                    <h3>Contact Us</h3>
                    <ul>
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                <!--</marquee>-->
                <marquee onMouseOver="this.stop()" onMouseOut="this.start()">
                    <h3 style="margin-bottom: 10px;">Contact Us
                        <span style="margin-left: 80%;">   
                            <a href="<?php echo base_url(); ?>">Home | </a>
                            <a href="#">Contact Us</a>
                        </span> 
                    </h3>
                </marquee>
            </div>
        </div>
        <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7543.352489654879!2d73.06583847462197!3d19.033982787005606!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c26d598ab6eb%3A0x6f0db565a64c8022!2sSector%2010%2C%20Kharghar%2C%20Navi%20Mumbai%2C%20Maharashtra%20410210!5e0!3m2!1sen!2sin!4v1691850456282!5m2!1sen!2sin"  width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hs_contact_head_text">
                        <h4 class="hs_contact_heading">
                            Feel Free to Send Us a Message</h4>
                        <p>Please contact us with any questions or concerns you may have. We will do our best to respond back to you in a timely manner. If you wish to have an expedited response you can also give us a phone call.</p>
                    </div>
                </div>
            </div>            
            <div class="row">
                <div class="col-lg-8 col-md-7 col-sm-7">
                    <h4 class="hs_heading">Leave a Message</h4><br>
                    <div class="well">

                        <form  id="contactForm">
                            <span id="error" class="err"></span>
                            <span id="success" class="err"></span>

                            <div class="alert alert-success hidden col-lg-12 col-sm-12 col-md-12 col-xs-12" id="contactSuccess">
                                <strong>Success!</strong> Your message has been sent to us.
                            </div>

                            <div class="alert alert-error hidden col-lg-12 col-sm-12 col-md-12 col-xs-12" id="contactError">
                                <strong>Error!</strong> There was an error sending your message.
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="input-group"> 
                                        <span class="input-group-btn">
                                            <button class="btn btn-success" type="button"><i class="fa fa-user"></i></button>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Full Name" id="name" name="name">
                                        <span id="error1" class="err"></span>
                                    </div>
                                    <!-- /input-group --> 
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="input-group"> 
                                        <span class="input-group-btn">
                                            <button class="btn btn-success" type="button"><i class="fa fa-envelope"></i></button>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Email" id="email" name="email">
                                        <span id="error2" class="err"></span>
                                    </div>
                                    <!-- /input-group --> 
                                </div>
                                <!-- /.col-lg-6 -->

                                <!-- /.col-lg-6 -->
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="input-group"> <span class="input-group-btn">
                                            <button class="btn btn-success" type="button"><i class="fa fa-envelope"></i></button>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Subject" id="subject" name="subject"/>
                                    </div>
                                    <!-- /input-group --> 
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <textarea class="form-control" rows="8" id="message" name="message" style="resize:none"></textarea>
                                        <span id="error3" class="err"></span>
                                    </div>
                                    <!-- /input-group --> 
                                </div>
                                <div class="clearfix"></div>
                                <p id="err"></p>
                                <div class="form-group">
                                    <div class="col-lg-8 col-md-8 col-sm-12">
                                        <!--<div class="checkbox">
                                            <label>
                                                <input type="checkbox" id="hs_checkbox" class="css-checkbox lrg" checked="checked"/>
                                                <label for="hs_checkbox" name="checkbox69_lbl" class="css-label lrg hs_checkbox">Receive Your Comments By Email</label>
                                            </label>
                                        </div> -->
                                        <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 af-outer af-required captcha_div">
                                            <div class="g-recaptcha" data-sitekey="6LfYQiATAAAAAOfojIlYIgIEp8m0SHjK-KmLGwlC"></div>
                                            <span id="error4" class="err"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12  class_buttom" style="margin-top:17px;">
                                        <button id="enquire-submit" class="btn btn-success" type="submit">Send</button>
                                    </div>
                                </div>
                                <div class-="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-5">
                    <h4 class="hs_heading">Contact</h4>
                    <div class="hs_contact">
                        <ul>
                            <li> <i class="fa fa-map-marker"></i>
                                <p>1404, Tricity Pristine, sector 10, Kharghar , Navi Mumbai
                                </p>
                            </li>

                            <li> <i class="fa fa-envelope"></i>
                                <p><a href="Mailto:spiffytech2508@gmail.com" style="    color: #242627;">spiffytech2508@gmail.com </a></p>

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>   
</div>
</div>
<!--main js file end-->
</body>
</html>
<script type="text/javascript" src="<?php echo base_url(); ?>asserts/js/jquery-1.11.0.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript">

            $(document).ready(function () {

                $("#enquire-submit").click(function (e) {

                    e.preventDefault();

                    $('#error1').html("");
                    $('#error2').html("");
                    $('#error3').html("");
                    $('#error4').html("");

                    var name = $.trim($("#name").val());
                    var email = $.trim($("#email").val());
                    var subject = $.trim($("#subject").val());
                    var message = $.trim($("#message").val());


                    if (grecaptcha.getResponse() == "") {
                        $('#error4').html("Please Check Captcha");
                        return false;
                    }

                    if (!name)
                    {

                        $('#error1').html("Enter Your Full Name");
                        return false;
                    }
                    if (/[^a-zA-Z \-]/.test(name))
                    {
                        $('#error1').html("Enter only alphabates in name");
                        return false;
                    }
                    if (!email)
                    {
                        $('#error2').html("Enter your Email ID");
                        return false;

                    }
                    var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
                    var valid = emailReg.test(email);

                    if (!valid) {
                        $('#error2').html("Enter Valid Email ID");
                        return false;
                    }

                    if (!message)
                    {
                        $('#error3').html("Enter your Message");
                        return false;
                    }

                    var data = $("#contactForm").serialize();
                    $.post('<?php echo base_url(); ?>Welcome/enquiry', data, function (response) {
                        $('#success').append('Thank you for connecting with us..!');

                        /* if (response.status == 'true')
                         {
                         $('#success').append('Thank you for connecting with us..!');
                         
                         } else if (response.status == 'false')
                         {
                         $('#error').html('Something went wrong');
                         } else {
                         if (response.hasOwnProperty('errors'))
                         {
                         $('#error').html('');
                         $('#error').append(' ' + response.errors + '');
                         } else {
                         $('#error').html('');
                         $('#enquire-form').css('display', 'none');
                         }
                         }*/
                    });
                });
            });

</script>