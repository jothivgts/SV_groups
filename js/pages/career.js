$( "#careerform" ).validate({
    rules: {
      career_yourname: {
        required: true
      },career_emailaddress: {
        required: true,
        email : true,
        required: true
      },
      career_mobilenumber: {
        required: true,
            number: true,
            minlength: 10,
            maxlength: 10
      },
      career_position:{
        required: true,
      }
    },
    messages: {
      career_yourname: "Kindly enter your name",
      career_emailaddress: {
        required: "Kindly enter your email address",
        email: "Enter valid format"
      }
      ,
      career_mobilenumber: {
        required: "Kindly enter your mobile number",
        number: "Enter valid mobile number",
            minlength: "Enter valid mobile number",
            maxlength: "Enter valid mobile number"
      },
      career_position : {
        required: "Kindly enter description",
      }
    },  
    submitHandler: function(form){
      let career_yourname = $('#career_yourname').val();
      let career_emailaddress = $('#career_mobilenumber').val();
      let career_mobilenumber = $('#career_mobilenumber').val();
      let career_position = $('#career_position').val();
  
      let fordata = { career_yourname,career_emailaddress,career_mobilenumber,career_position };
 
    
      console.log(fordata);
    }
  });