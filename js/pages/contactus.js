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
    submitHandler: function(form){
      let yourname = $('#contact_yourname').val();
      let mobilenumber = $('#contact_mobilenumber').val();
      let emailaddress = $('#contact_emailaddress').val();
      let description = $('#contact_description').val();

      let fordata = { yourname,mobilenumber,emailaddress,description };
      console.log(fordata);
      //Button load
      document.getElementById("contactbtn").disabled = true;
      document.getElementById("contactbtn").innerHTML = "Loading ..."; 
      
      $.get("backend/enquirymail.php",fordata,function(data, status){
        //After mail sent
        alert('Form submited');

        document.getElementById("contactusform").reset();
        document.getElementById("contactbtn").disabled = false;
        document.getElementById("contactbtn").innerHTML = "Submit"; 
      });
    }
  });

  function contactRecaptcha(contactRecaptcha) {
    document.getElementById("contactRecaptcha").value = contactRecaptcha;
  };
  