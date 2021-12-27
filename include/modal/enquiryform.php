<?php ?>

<div class="modal fade" id="form-modal" tabindex="-1" role="dialog" aria-labelledby="form-modal-title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="form-modal-title">Enquire Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="mail.php" method="post" class="modal-form">
                           <input 
                           class="form-control" 
                           type="text" 
                           placeholder="Your name" 
                           name="name" 
                           id="yourname"
                           onkeyup="FormInvalidMessageName(this)"
                           minlength="3"
                            onkeypress="return (
                             (event.charCode > 64 && event.charCode < 91) ||
                             (event.charCode > 96 && event.charCode < 123) ||
                             event.charCode == 32 );"
                           required
                           >
                        
                           <input 
                           class="form-control" 
                           type="text" 
                           placeholder="Your Email" 
                           name="email"
                           onkeyup="FormInvalidMessageEmail(this)"
                           pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                           class="form-control"
                           required    
                           >

                           <input 
                           class="form-control" 
                           type="number" 
                           placeholder="Mobile number" 
                           name="number"
                           id="yourmobileno"
                           min="999999999"
                           onkeyup="FormInvalidMessagePhone(this)"
                           maxlength="10"
                           oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                           required
                           >
                        
                           <textarea 
                           class="form-control" 
                           placeholder="Your description" 
                           name="description"
                           >
                           </textarea>
                           <div 
                           class="g-recaptcha" data-sitekey="6LeCkMUdAAAAAOly8h1e4t4oIRlDODXWbBM5iUJ4"></div>
                        </form> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" >Close</button>
                        <button  type="submit" value="Submit" class="btn btn-outline-warning">submit</button>
                    </div>
                </div>
            </div>
        </div> 