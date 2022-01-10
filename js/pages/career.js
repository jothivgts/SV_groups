$("#careerform").submit(function(e) {
  e.preventDefault();
}).validate({
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
      },
      resume:{
        required: true,
        extension: "pdf"
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
        required: "Kindly choose description",
      },

    },  
    submitHandler: function(form){
      callApicall(form)
    }
  });

  function callApicall(form) {

    let yourname = $('#career_yourname').val();
    let emailaddress = $('#career_emailaddress').val();
    let mobilenumber = $('#career_mobilenumber').val();
    let position = $('#career_position').val();
    let fordata = { yourname,emailaddress,mobilenumber,position };
    
    var formData = new FormData();

    let props = $('#resume').prop('files');
		let file = props[0];
     
    formData.append("career_yourname", $('#career_yourname').val())
    formData.append("career_emailaddress", $('#career_emailaddress').val());
    formData.append("career_mobilenumber", $('#career_mobilenumber').val());
    formData.append("career_position", $('#career_position').val());
    formData.append("resume", file,"resume.pdf");

    //Button load
    document.getElementById("careerbtn").disabled = true;
    document.getElementById("explornow_submitbtn").innerHTML = "Loading ..."; 
    
     $.ajax({
      url: 'backend/career.php',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      method: 'POST',
      type: 'POST',
      success: function(data){
        document.getElementById("careerform").reset();
        document.getElementById("careerbtn").disabled = false;
        alert('Form Submited');
      }
  });
  }