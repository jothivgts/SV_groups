<?php ?>

<div data-backdrop="static" data-keyboard="false" class="modal fade" id="mobileverfication-modal" tabindex="-1" role="dialog" aria-labelledby="form-modal-title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="form-modal-title">OTP VERIFICATION</h5>
                    </div>
                    <div class="modal-body">
                        <form id="otpform" name class="modal-form">
                        
                        <lable for="otp_input">Enter OTP</lable>
                        <input 
                           class="form-control mb-5" 
                           type="text" 
                           placeholder="XXXXXX" 
                           name="otp_input" 
                           id="otp_input"
                           maxlength="6"
                           >
                           <span id="otpnotification"></span>
                        <div  class="modalformcustomfooter">
                        <button type="button" id="submitotp" class="btn btn-outline-info mr-1" > SUBMIT OTP </button>
                        <button type="button" id="resendotp" class="btn btn-outline-success mr-1" > RESEND OTP </button>
                        <button type="button" id="cancelmobileverification" class="btn btn-outline-danger" > CANCEL </button>
                        </div>
                       
                        </form> 
                    </div>
                  
                </div>
            </div>
</div> 