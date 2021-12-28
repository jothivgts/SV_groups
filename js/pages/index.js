$( "#exploreform" ).validate({
    ignore: ".ignore",
    rules: {
      explore_yourname: {
        required: true
      },explore_emailaddress: {
        required: true,
        email : true,
        required: true
      },
      explore_mobilenumber: {
        required: true,
            number: true,
            minlength: 10,
            maxlength: 10
      },
      explore_description:{
        required: true,
      },
      homeRecaptcha: {
        required: function () {
          return document.getElementById("homeRecaptcha").value == "";
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
      let explore_yourname = $('#explore_yourname').val();
      let explore_emailaddress = $('#explore_mobilenumber').val();
      let explore_mobilenumber = $('#explore_mobilenumber').val();
      let explore_description = $('#explore_description').val();
  
      let fordata = { explore_yourname,explore_emailaddress,explore_mobilenumber,explore_description };
  
      $.get("backend/enquirymail.php",fordata,function(data, status){
        alert("Data: " + data + "\nStatus: " + status);
      });
  
    }
  });
  
  function homeRecaptcha(callbackvalue) {
    document.getElementById("homeRecaptcha").value = callbackvalue;
  };
  