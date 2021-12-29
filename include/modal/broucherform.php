<?php ?>

<div class="modal fade" id="broucherform-modal" tabindex="-1" role="dialog" aria-labelledby="form-modal-title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="form-modal-title">Broucher Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="broucherform" name class="modal-form">
                           <input 
                           class="form-control" 
                           type="text" 
                           placeholder="Your Name *" 
                           name="broucherform_yourname" 
                           id="broucherform_yourname"
                           >
                        
                           <input 
                           class="form-control" 
                           type="text" 
                           placeholder="Your Email *" 
                           name="broucherform_emailaddress"
                           id="broucherform_emailaddress"
                           >

                           <input 
                           class="form-control" 
                           type="number" 
                           placeholder="Mobile Number *" 
                           name="broucherform_mobilenumber"
                           id="broucherform_mobilenumber"
                           >
                        
                           <textarea 
                           class="form-control" 
                           placeholder="Your description" 
                           name="broucherform_description"
                           id="broucherform_description"
                           ></textarea>


                           <div 
                           class="g-recaptcha"
                           data-sitekey="6LeCkMUdAAAAAOly8h1e4t4oIRlDODXWbBM5iUJ4"
                           data-callback="broucherformRecaptcha"
                           >
                            </div>
                            <input type="hidden" name="broucherformRecaptcha" id="broucherformRecaptcha" value="">


                        <div  css="modalformcustomfooter">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" >Close</button>
                        <button  type="submit"  class="btn btn-outline-warning" style="margin-">submit</button>
                        </div>
                       
                        </form> 
                    </div>
                  
                </div>
            </div>
</div> 