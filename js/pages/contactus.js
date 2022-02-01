//FORM VALIDATION START
$( "#contactusform" ).validate({
    ignore: ".ignore",
    rules: {
      contact_yourname: {
        required: true
      },contact_emailaddress: {
        required: true,
        email : true,
        required: true
      },
      contact_mobilenumber: {
        required: true,
            number: true,
            minlength: 10,
            maxlength: 10
      },
      contact_description:{
        required: true,
      },
      contactRecaptcha: {
        required: function () {
          return document.getElementById("contactRecaptcha").value == "";
        }
      }
    },
    messages: {
      explore_yourname: "Kindly enter your name",
      explore_emailaddress: {
        required: "Kindly enter your email address",
        email: "Enter valid format"
      }
      ,
      explore_mobilenumber: {
        required: "Kindly enter your mobile number",
        number: "Enter valid mobile number",
            minlength: "Enter valid mobile number",
            maxlength: "Enter valid mobile number"
      },
      explore_description : {
        required: "Kindly enter description",
      }
    },  
    submitHandler: function(){
      sendOtp();
    }
});

function contactRecaptcha(contactRecaptcha) {
  document.getElementById("contactRecaptcha").value = contactRecaptcha;
};

// FORM VALIDATION END



  // MOBILE OTP AND VALIDATION START

  function MobileModalStatis(){
    $('#mobileverfication-modal').modal({backdrop: 'static', keyboard: false})  
  }

  setTimeout(function() {
    MobileModalStatis()
  },3000);
  

  let statuscode = "";

  document.getElementById("submitotp").addEventListener("click",function() {

    document.getElementById("otpnotification").innerHTML="";

    let otp_input = document.getElementById("otp_input").value;
    let formData = { statuscode,otp_input };

    $.ajax({
      url: 'backend/api.php?verifyotp=true',
      data: formData,
      method: 'POST',
      type: 'POST',
      success: function(data){
        let { Status , Details } = JSON.parse(data);
        if(Status == "Success"){
          callApicall();
        }else{
          document.getElementById("otpnotification").innerHTML=Details;
        }
      },
      error: function(data) {
        console.log("SUBMIT FAILURE");
        console.log(data);
      }
    });
    
  });

  document.getElementById("resendotp").addEventListener("click",function() {

    document.getElementById("otpnotification").innerHTML="";

    let mobilenumber = $('#contact_mobilenumber').val();
    let formData = { mobilenumber };

    $.ajax({
      url: 'backend/api.php?sendotptouser=true',
      data: formData,
      method: 'POST',
      type: 'POST',
      success: function(data){
        let { Status , Details } = JSON.parse(data);
        if(Status == "Success"){
          statuscode = Details;
          document.getElementById("otpnotification").innerHTML="OTP re-sent successfull";
        }else{
          statuscode = "";
          document.getElementById("otpnotification").innerHTML=Details;
        }
      },
      error: function(data) {
        console.log("SEND OTP TO USER FAILURE");
        console.log(data);
      }
    });

  });

  function sendOtp(){
    document.getElementById("otpnotification").innerHTML="";

    let mobilenumber = $('#contact_mobilenumber').val();
    let formData = { mobilenumber };

    $.ajax({
      url: 'backend/api.php?sendotptouser=true',
      data: formData,
      method: 'POST',
      type: 'POST',
      success: function(data){
        let { Status , Details } = JSON.parse(data);
        if(Status == "Success"){
          statuscode = Details;
          $('#mobileverfication-modal').modal('toggle');
        }else{
          statuscode = "";
          document.getElementById("otpnotification").innerHTML=Details;
        }
      },
      error: function(data) {
        console.log("SEND OTP TO USER FAILURE");
        console.log(data);
      }
    });
  }

  function hideModal(){
    statuscode="";
    document.getElementById("otpnotification").innerHTML="";
    document.getElementById("otp_input").value="";
    $('#mobileverfication-modal').modal('toggle');
  }

  document.getElementById("cancelmobileverification").addEventListener("click",function() {
    hideModal();
  });
  
  
  function callApicall() {
    let yourname = $('#contact_yourname').val();
    let mobilenumber = $('#contact_mobilenumber').val();
    let emailaddress = $('#contact_emailaddress').val();
    let description = $('#contact_description').val();
  
    let fordata = { yourname,mobilenumber,emailaddress,description };
    
     $.ajax({
      url: 'backend/enquirymail.php',
      data: fordata,
      method: 'GET',
      type: 'GET',
      success: function(data){
        console.log("SAVE FORM SUCCESS");
        console.log(data);
        document.getElementById("contactusform").reset();
        document.getElementById("otpnotification").innerHTML="Form submitted";
        setTimeout(function() {
          hideModal();
        },2000);
      },
      error: function(data) {
        console.log("OTP FAILURE");
        console.log(data);
      }
    });

  }
  // MOBILE OTP AND VALIDATION END