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
  


// Home page lightbox strat

      // Get the modal
      let modal = document.getElementById("masterPlanlightmodal");

      // Get the image and insert it inside the modal - use its "alt" text as a caption
      let masterPlanopenBtn = document.getElementById("masterPlanopenBtn");
      let modalImg = document.getElementById("lightbox-image");
      
      masterPlanopenBtn.onclick = function(){
        modal.style.display = "block";
        modalImg.src = "./images/img.jpg";
      }

      // Get the <span> element that closes the modal
      let span = document.getElementsByClassName("lightboxclose")[0];

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() { 
        modal.style.display = "none";
      }

// Home page lightbox End