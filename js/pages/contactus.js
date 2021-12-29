$( "#contactusform" ).validate({
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
      }
    },
    messages: {
      contact_yourname: "Kindly enter your name",
      contact_emailaddress: {
        required: "Kindly enter your email address",
        email: "Enter valid format"
      }
      ,
      contact_mobilenumber: {
        required: "Kindly enter your mobile number",
        number: "Enter valid mobile number",
            minlength: "Enter valid mobile number",
            maxlength: "Enter valid mobile number"
      },
      contact_description : {
        required: "Kindly enter description",
      }
    },  
    submitHandler: function(form){
      let contact_yourname = $('#contact_yourname').val();
      let contact_emailaddress = $('#contact_mobilenumber').val();
      let contact_mobilenumber = $('#contact_mobilenumber').val();
      let contact_description = $('#contact_description').val();
  
      let fordata = { contact_yourname,contact_emailaddress,contact_mobilenumber,contact_description };
 
    
      console.log(fordata);
    }
  });