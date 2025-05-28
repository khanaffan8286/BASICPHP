$(document).ready(function() {
    $("#firstnameerror").hide();
    $("#lastnameerror").hide();
    $("#addresserror").hide();
    $("#emailerror").hide();
    $("#Passerror").hide();
    $("#ConfirmPassworderror").hide();
    $("#gendererror").hide();
    $("#doberror").hide();
    $("#ziperror").hide();
    $("#mobileerror").hide();

    $("#firstname").focusout(function() {
        check_fname();
    });
    $("#lastname").focusout(function() {
        check_lname();
    });
    $("#address").focusout(function() {
        check_address();
    })
    $("#email").focusout(function() {
        check_email();
    });
    $("#Pass").focusout(function(){
        check_Pass();
    });
    $("#ConfirmPassword").focusout(function(){
        check_ConfirmPassword();
    });
    $("#dob").focusout(function() {
        check_dob();
    })
    $("#gender").focusout(function() {
        check_gender();
    });
    $("#zip").focusout(function(){
        check_zip();
    });
    $("#mobile").focusout(function() {
        check_mobile();
    });

    var error_fisrtName = false;
    var error_lastname = false;
    var error_address = false;
    var error_email = false;
    var error_Pass = false;
    var error_ConfirmPassword = false;
    var error_gender = false;
    var error_dob = false;
    var error_zip = false;
    var error_mobile = false;


    

    function check_fname() {
        var pattern = /^[a-zA-Z]*$/;
        var fname = $("#firstname").val();
        
        if(pattern.test(fname) && fname !==''){
            $("#firstnameerror").hide();
            $("#firstname").css("border-bottom", "2px solid #34F458");
            error_fisrtName = false;
        }
        else if(fname === ''){
            $("#firstnameerror").html("First Name must not be empty");
            $("#firstnameerror").show();
            $("#firstname").css("border-bottom", "2px solid #F90A0A");
            error_fisrtName = true;
        }
        else{
            $("#firstnameerror").html("Kindly enter your firstname correctly ");
            $("#firstnameerror").show();
            $("#firstname").css("border-bottom", "2px solid #F90A0A");
            error_fisrtName = true;
        }
    };

    function check_lname() {
        var pattern = /^[a-zA-Z]*$/;
        var lname = $("#lastname").val();

        if (pattern.test(lname) && lname!==''){
            $("#lastnameerror").hide();
            $("#lastname").css("border-bottom", "2px solid #34F458");
            error_lastname = false;
        }
        else if (lname === '') {
            $("#lastnameerror").html("Last Name must not be empty");
            $("#lastnameerror").show();
            $("#lastname").css("border-bottom", "2px solid #F90A0A")
            error_lastname = true;
        }
        else {
            $("#lastnameerror").html("Kindly enter your lastname correctly");
            $("#lastnameerror").show();
            $("#lastname").css("border-bottom", "2px solid #F90A0A")
            error_lastname = true;
        }
    };

    function check_address() {
        var address = $("#address").val();

        if (address !== ''){
            $("#addresserror").hide();
            $("#address").css("border-bottom", "2px solid #34F458");
            error_address = false;
        }
        else{
            $("#addresserror").html("Please enter your address");
            $("#addresserror").show();
            $("#address").css("border-bottom", "2px solid #F90A0A");
            error_address = true;
        }
    };

    function check_email(){
        var pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        var email = $("#email").val();

        if(pattern.test(email) && email !== ''){
            $("#emailerror").hide();
            $("#email").css("border-bottom", "2px solid #34F458");
            error_email = false;
        }
        else{
            $("#emailerror").html("Kindly enter a valid email address");
            $("#emailerror").show();
            $("#email").css("border-bottom", "2px solid #F90A0A");
            error_email = true;
        }

    };

    function check_Pass(){
        var pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        var Pass = $("#Pass").val();

        if(pattern.test(Pass) && Pass !== ''){
            $("#Passerror").hide();
            $("#Pass").css("border-bottom", "2px solid #34F458");
            error_Pass = false;
        }
        else{
            $("#Passerror").html("Password must be 8+ chars with 1 uppercase, 1 lowercase, 1 number & 1 special character.");
            $("#Passerror").show();
            $("#Pass").css("border-bottom", "2px solid #F90A0A");
            error_Pass = true;
        }

    };

    function check_ConfirmPassword() {
        var Pass = $("#Pass").val();
        var ConfirmPassword = $("#ConfirmPassword").val();
    
        if (ConfirmPassword === Pass && ConfirmPassword !== '') {
            $("#ConfirmPassworderror").hide();
            $("#ConfirmPassword").css("border-bottom", "2px solid #34F458");
            error_ConfirmPassword = false;
        } else {
            $("#ConfirmPassworderror").html("Confirm Password must match the Password.");
            $("#ConfirmPassworderror").show();
            $("#ConfirmPassword").css("border-bottom", "2px solid #F90A0A");
            error_ConfirmPassword = true;
        }
    };

    function check_gender() {
        
        var gender = $("#gender").val();
    
        if (gender !== '') {
            $("#gendererror").hide();
            $("#gender").css("border-bottom", "2px solid #34F458");
            error_gender = false;
        } else {
            $("#gendererror").html("please select the gender");
            $("#gendererror").show();
            $("#gender").css("border-bottom", "2px solid #F90A0A");
            error_gender = true;
        }
    };


    

    function check_zip(){
        var pattern = /^[1-9][0-9]{5}$/;
        var zip = $("#zip").val();

        if (pattern.test(zip) &&zip !== ''){
            $("#ziperror").hide();
            $("#zip").css("border-bottom", "2px solid #34F458");
            error_zip = false;
        }
        else if(zip === ''){
            $("#ziperror").html("Please ensure your ZIP code is not empty ");
            $("#ziperror").show();
            $("#zip").css("border-bottom", "2px solid #F90A0A");
            error_zip = true;
        } 
        else {
            $("#ziperror").html("Please ensure your ZIP code contains 6 numbers");
            $("#ziperror").show();
            $("#zip").css("border-bottom", "2px solid #F90A0A");
            error_zip = true;
        }
        
    };

    function check_mobile() {

        var pattern = /^(0|91)?[6-9][0-9]{9}$/;
        var mobile = $("#mobile").val();

        if(pattern.test(mobile) && mobile !== ''){
            $("#mobileerror").hide();
            $("#mobile").css("border-bottom", "2px solid #34F458");
            error_mobile = false;
        } else {
            $("#mobileerror").html("Please ensure your mobile number is entered correctly");
            $("#mobileerror").show();
            $("#mobile").css("border-bottom", "2px solid #F90A0A");
            error_mobile = true;
        }
    };
    


    $("#form").submit(function(e) {
        
       

        check_fname();
        check_lname();
        check_address();
        check_email();
        check_Pass();
        check_ConfirmPassword();
        check_gender();
        check_dob();
        check_zip();
        check_mobile();

        if (error_fisrtName === false && error_lastname===false && error_address===false && error_email=== false && error_Pass==false &&error_ConfirmPassword===false && 
        error_gender===false  &&   error_dob===false &&
        error_zip === false && error_mobile === false
        ){
           
            
        }
        else {
            e.preventDefault();
            
        }
    });
    $("#reset").click(function() {
        $("#form")[0].reset();
        $("input").css("border-bottom", "1px solid #ccc");
    });

  

});