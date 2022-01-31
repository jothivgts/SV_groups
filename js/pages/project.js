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
    let floorplan_emailaddress = $('#floorplan_emailaddress').val();
    let floorplan_mobilenumber = $('#floorplan_mobilenumber').val();
    let floorplan_description = $('#floorplan_description').val();
    let twobhk = document.getElementById('2bhk').checked;
    let type
    if(twobhk) { type = "2bhk" } else { type = "3bhk"}

    
    let fordata = { floorplan_yourname,floorplan_emailaddress,floorplan_mobilenumber,floorplan_description,type };
    
    let bhk2 = ['./asset/2BHK.zip'];
    let bhk3 = ['./asset/3BHK.zip'];

    //Button load
    document.getElementById("floorplan_submitbtn").disabled = true;
    document.getElementById("floorplan_submitbtn").innerHTML = "Loading ..."; 
    $.get("backend/floorplanmail.php",fordata,function(data, status){
      //After mail sent
      if(twobhk) {
        window.open(bhk2, "_blank");
        let link = document.createElement('a');
        link.href = bhk2;
        link.download = "2bhk.zip";
        link.dispatchEvent(new MouseEvent('click'));
    } else {
        window.open(bhk3, "_blank");
        let link = document.createElement('a');
        link.href = bhk3;
        link.download = "3bhk.zip";
        link.dispatchEvent(new MouseEvent('click'));
    }
      $('#floorplanform-modal').modal('toggle');
      document.getElementById("floorplanform").reset();
      document.getElementById("floorplan_submitbtn").disabled = false;
      document.getElementById("floorplan_submitbtn").innerHTML = "Submit"; 
    });
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

  let yourname = $('#broucherform_yourname').val();
  let emailaddress = $('#broucherform_emailaddress').val();
  let mobilenumber = $('#broucherform_mobilenumber').val();
  let description = $('#broucherform_description').val();

  let fordata = { yourname,emailaddress,mobilenumber,description  };
    
  //Button load
  document.getElementById("broucher_submitbtn").disabled = true;
  document.getElementById("broucher_submitbtn").innerHTML = "Loading ..."; 
  $.get("backend/brouchermail.php",fordata,function(data, status){
    //After mail sent
    let filepath = './asset/brochure.pdf';
    let link = document.createElement('a');
    link.href = filepath;
    link.download = "brochure.pdf";
    link.dispatchEvent(new MouseEvent('click'));

    $('#broucherform-modal').modal('toggle');
    document.getElementById("broucherform").reset();
    document.getElementById("broucher_submitbtn").disabled = false;
    document.getElementById("broucher_submitbtn").innerHTML = "Submit"; 
  });
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
      modalImg.src = "./asset/masterplan.jpg";
    }

    // Get the <span> element that closes the modal
    let span = document.getElementsByClassName("lightboxclose")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
      modal.style.display = "none";
    }

// Home page lightbox End