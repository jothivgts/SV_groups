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
  


//  Floor plan form start

  $( "#floorplanform" ).validate({
    ignore: ".ignore",
    rules: {
      floorplan_yourname: {
        required: true
      },floorplan_emailaddress: {
        required: true,
        email : true,
        required: true
      },
      floorplan_mobilenumber: {
        required: true,
            number: true,
            minlength: 10,
            maxlength: 10
      },
      floorplan_description:{
        required: true,
      },
      floorplan: { 
        required: true
      },
      floorplanRecaptcha: {
        required: function () {
          return document.getElementById("floorplanRecaptcha").value == "";
        }
      }
    },
    messages: {
      floorplan_yourname: "Kindly enter your name",
      floorplan_emailaddress: {
        required: "Kindly enter your email address",
        email: "Enter valid format"
      }
      ,
      floorplan_mobilenumber: {
        required: "Kindly enter your mobile number",
        number: "Enter valid mobile number",
            minlength: "Enter valid mobile number",
            maxlength: "Enter valid mobile number"
      },
      floorplan_description : {
        required: "Kindly enter description",
      }
    },  
    submitHandler: function(form){

      let floorplan_yourname = $('#floorplan_yourname').val();
      let floorplan_emailaddress = $('#floorplan_mobilenumber').val();
      let floorplan_mobilenumber = $('#floorplan_mobilenumber').val();
      let floorplan_description = $('#floorplan_description').val();
      let floorplan = $('#floorplan').val();


      let fordata = { floorplan_yourname,floorplan_emailaddress,floorplan_mobilenumber,floorplan_description , floorplan };
      
     
      let bhk2 = ['../../svgroups/asset/floorplan/sample.pdf','../../svgroups/asset/floorplan/sample.pdf'];
      let bhk3 = ['../../svgroups/asset/floorplan/sample.pdf','../../svgroups/asset/floorplan/sample.pdf','../../svgroups/asset/floorplan/sample.pdf'];

      if(floorplan === '2bhk'){
        bhk2.forEach(filepath => {
          window.open(filepath, "_blank");
        });

        bhk2.forEach(filepath => {
        let link = document.createElement('a');
        link.href = filepath;
        link.download = filepath;
        link.dispatchEvent(new MouseEvent('click'));
        });

      }else{
        bhk3.forEach(filepath => {
          window.open(filepath, "_blank");
        });

        bhk3.forEach(filepath => {
        let link = document.createElement('a');
        link.href = filepath;
        link.download = filepath;
        link.dispatchEvent(new MouseEvent('click'));
        });
      }
      



      // $.get("backend/enquirymail.php",fordata,function(data, status){
      //   alert("Data: " + data + "\nStatus: " + status);
      // });


  
    }
  });
  
  function floorplanRecaptcha(callbackvalue) {
    document.getElementById("floorplanRecaptcha").value = callbackvalue;
  };

// Floor plan form end




//  Broucher form start

$( "#broucherform" ).validate({
  ignore: ".ignore",
  rules: {
    broucherform_yourname: {
      required: true
    },broucherform_emailaddress: {
      required: true,
      email : true,
      required: true
    },
    broucherform_mobilenumber: {
      required: true,
          number: true,
          minlength: 10,
          maxlength: 10
    },
    broucherform_description:{
      required: true,
    },
    broucherformRecaptcha: {
      required: function () {
        return document.getElementById("broucherformRecaptcha").value == "";
      }
    }
  },
  messages: {
    broucherform_yourname: "Kindly enter your name",
    broucherform_emailaddress: {
      required: "Kindly enter your email address",
      email: "Enter valid format"
    }
    ,
    broucherform_mobilenumber: {
      required: "Kindly enter your mobile number",
      number: "Enter valid mobile number",
          minlength: "Enter valid mobile number",
          maxlength: "Enter valid mobile number"
    },
    broucherform_description : {
      required: "Kindly enter description",
    }
  },  
  submitHandler: function(form){

    let broucherform_yourname = $('#broucherform_yourname').val();
    let broucherform_emailaddress = $('#broucherform_mobilenumber').val();
    let broucherform_mobilenumber = $('#broucherform_mobilenumber').val();
    let broucherform_description = $('#broucherform_description').val();

    let fordata = { broucherform_yourname,broucherform_emailaddress,broucherform_mobilenumber,broucherform_description  };
    
   
          let filepath = '../../svgroups/asset/broucherform/sample.pdf';
          window.open(filepath, "_blank");
          let link = document.createElement('a');
          link.href = filepath;
          link.download = filepath;
          link.dispatchEvent(new MouseEvent('click'));
      


    // $.get("backend/enquirymail.php",fordata,function(data, status){
    //   alert("Data: " + data + "\nStatus: " + status);
    // });



  }
});

function broucherformRecaptcha(callbackvalue) {
  document.getElementById("broucherformRecaptcha").value = callbackvalue;
};

//  Broucher form end

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