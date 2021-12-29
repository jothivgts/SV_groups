<?php include('./include/config.php');?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SV Housing</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
  <body>
  <header>
    <?php include('./include/navigation.php');?>
    </header>
    <main>
      <!-- banner -->
      <section class="banner">
        <h1>Contact Us</h1>
      </section>
      <!-- info -->
        <div class="container cinfo">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4 ">
                    <h5>PHONE</h5>
                    <p>Head Office:<br> 080- 29505657</p>
                    <p>Sale Office:<br> +91-9845001343, 9845001560,<br> 9845001792</p>
                </div>
                <div class="col-12 col-sm-6 col-md-4 ">
                    <h5>E-MAIL</h5>
                    <p>admin@svgroups.in<br>www.svgroups.in</p>
                </div>
                <div class="col-12 col-sm-6 col-md-4 ">
                    <div class="row">
                        <h5>Address</h5>
                        <p>No.89, 3rd Floor V.M.Cosma, Karthik <br>Nagar, Marathahalli, Outer Ring Road,<br>
                            Bangalore – 560 037.</p>
                    </div>
                </div>
            </div>
        </div>
      <!-- Form -->
      <section id="contact-container">
          <div class="container">
              <div class="row">
                  <div class="col-12 col-md-6">
                      <div class="form-container">
                            <form class="form_block" id="contactusform" name="contactusform">
                          <div class="form-group">
                              <label class="form-label" for="name">Name *</label>
                              <input class="form-control" type="text" placeholder="Leslie Alexander" name="contact_yourname" id="contact_yourname">
                          </div>
                  
                          <div class="form-group">
                              <label class="form-label" for="number">Contact Number *</label>
                              <input class="form-control" type="number" placeholder="99808 78654" name="contact_mobilenumber" id="contact_mobilenumber">
                          </div>
                  
                          <div class="form-group">
                              <label class="form-label" for="email">Email Address *</label>
                              <input class="form-control" type="text" placeholder="example@mail.com" name="contact_emailaddress" id="contact_emailaddress">
                          </div>
                  
                        <div class="form-group">
                            <label class="form-label" for="description">Description *</label>
                            <textarea class="form-control" placeholder="Your description" name="contact_description" id="contact_description"></textarea>
                        </div>
                  
                          <button type="submit" class="cform-btn">
                              Submit
                              <svg class="arrow" width="18" height="10" viewBox="0 0 21 12"
                                  xmlns="http://www.w3.org/2000/svg">
                                  <path d="M15 6.75H0V5.25H15V0L21 6L15 12V6.75Z"></path>
                              </svg>
                          </button>
                            </form>
                      </div>
                  </div>
                  <div class="col-12 col-md-6">
                      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d497933.70259365474!2d77.6864446!3d12.8363584!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae6db33296d633%3A0x335dd63bf6d65b!2sSV%20GRANDUR%20-%20Apartments%20in%20Electronic%20City!5e0!3m2!1sen!2sin!4v1640091599796!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                  </div>
              </div>
          </div>
      </section>
    </main>

    <?php include ('./include/footer.php'); ?>

    <!-- javascript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="owlcarousel/owl.carousel.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/pages/contactus.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- javascript -->
    
  </body>
</html>
