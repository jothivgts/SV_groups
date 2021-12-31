$(document).ready(function () {
  var owl = $("#first_slider")
  owl.owlCarousel({
    items: 2,
    loop: true,
    center: true,
    margin: 20,
    nav: false,
    // navText: ["<i class='fas fa-arrow-right'></i>","<img src='arrow-right-solid.svg'>"],
    autoplay: false,
    responsiveClass: true,
    responsive: {
      600: {
        item:2,
      },
      426: {
        items: 1,
      },
      375: {
        items: 1,
      },
      320: {
        items: 1,
      },
      0: {
        items: 1,
      },
    },
  })
})

$(document).ready(function () {
  var owl = $("#second_slider")
  owl.owlCarousel({
    items: 3,
    loop: true,
    margin: 20,
    nav: false,
    autoplay: false,
    autoplayTimeout: 4000,
    autoplayHoverPause: false,
    responsiveClass: true,
    responsive: {
      600: {
        item:3,
        nav: false,
      },
      476: {
        items: 1,
        nav: false,
      },
      375: {
        items: 1,
        nav: false,
      },
      320: {
        items: 1,
        nav: false,
      },
      0: {
        items: 1,
        nav: false,
      },
    },
  })
})

$(document).ready(function () {
  "use strict"

  var c,
    currentScrollTop = 0,
    navbar = $(".navbar"),
    btn = $(".ani-b2")

  $(window).scroll(function () {
    var a = $(window).scrollTop()
    var b = navbar.height()

    currentScrollTop = a

    if (c < currentScrollTop && a > 2*b) {
      // if (c < currentScrollTop) {

      navbar.addClass("scrollUp")
      btn.addClass("scrollUp")
      // } else if (c > currentScrollTop) {
    } else if (c > currentScrollTop && !(a <= b)) {
      navbar.removeClass("scrollUp")
      btn.removeClass("scrollUp")
    }
    c = currentScrollTop
  })
})

function FormInvalidMessageEmail(textbox) {
  if (!textbox.value) {
    textbox.style.color = "black";
    textbox.setCustomValidity("Please Enter Email Id");
  } else if (textbox.validity.patternMismatch) {
    textbox.style.color = "rgb(255, 66, 66)";
    textbox.setCustomValidity("Please Enter Valid Email Id");
  } else {
    textbox.style.color = "black";
    textbox.setCustomValidity("");
  }
}

function FormInvalidMessageName(textbox) {
  if (!textbox.value) {
    textbox.style.color = "black";
    textbox.setCustomValidity("Please Enter Name");
  } else if (textbox.validity.tooShort) {
    textbox.style.color = "rgb(255, 66, 66)";
    textbox.setCustomValidity("Name should be min 3 characters");
  } else {
    textbox.style.color = "black";
    textbox.setCustomValidity("");
  }
}

function FormInvalidMessagePhone(textbox) {
  if (!textbox.value) {
    textbox.style.color = "black";
    textbox.setCustomValidity("Please Enter Mobile No");
  } else if (textbox.validity.rangeUnderflow) {
    textbox.style.color = "rgb(255, 66, 66)";
    textbox.setCustomValidity("Please Enter Valid Mobile No");
  } else {
    textbox.style.color = "black";
    textbox.setCustomValidity("");
  }
}

function FormInvalidMessagePurpose(select) {
  if (select.validity.valueMissing) {
    select.setCustomValidity("Please Select Purpose");
  } else {
    select.setCustomValidity("");
  }
}


$( "#enquiryform" ).validate({
  ignore: ".ignore",
  rules: {
    yourname: {
      required: true
    },emailaddress: {
      required: true,
      email : true,
      required: true
    },
    mobilenumber: {
      required: true,
		  number: true,
		  minlength: 10,
		  maxlength: 10
    },
    description:{
      required: true,
    },
    hiddenRecaptcha: {
      required: function () {
        return document.getElementById("hiddenRecaptcha").value == "";
      }
    }
  },
  messages: {
    yourname: "Kindly enter your name",
    emailaddress: {
      required: "Kindly enter your email address",
      email: "Enter valid format"
    }
    ,
    mobilenumber: {
      required: "Kindly enter your mobile number",
      number: "Enter valid mobile number",
		  minlength: "Enter valid mobile number",
		  maxlength: "Enter valid mobile number"
    },
    description : {
      required: "Kindly enter description",
    }
  },  
  submitHandler: function(form){
    let yourname = $('#yourname').val();
    let emailaddress = $('#mobilenumber').val();
    let mobilenumber = $('#mobilenumber').val();
    let description = $('#description').val();
    let fordata = { yourname,emailaddress,mobilenumber,description };

    //Button load
    document.getElementById("enquiryform_submitbtn").disabled = true;
    document.getElementById("enquiryform_submitbtn").innerHTML = "Loading ..."; 
    
    $.get("backend/enquirymail.php",fordata,function(data, status){
      //After mail sent
      $('#form-modal').modal('toggle');
      document.getElementById("enquiryform").reset();
      document.getElementById("enquiryform_submitbtn").disabled = false;
      document.getElementById("enquiryform_submitbtn").innerHTML = "Submit"; 
    });
  }
});

function recaptchaCallback(callbackvalue) {
  document.getElementById("hiddenRecaptcha").value = callbackvalue;
};









