<?php 

class TWOFACTOR {
    // Properties
    private $twofactorapikey = "a280f625-2991-11eb-83d4-0200cd936042";

    // Functions
    public function sendOtp($mobilenumber){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://2factor.in/API/V1/".$this->twofactorapikey."/SMS/".$mobilenumber."/AUTOGEN/%20MOBILE%20NUMBER%20VERIFICATION",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

    public function verifyOtp($statuscode,$otp_input){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://2factor.in/API/V1/".$this->twofactorapikey."/SMS/VERIFY/".$statuscode."/".$otp_input,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

}

// Function declaration start
function sendotptouser($REQ){
    $TwoFactor = new TWOFACTOR();
    return $TwoFactor->sendOtp($REQ['mobilenumber']);
}

function verifyotp($REQ){
    $TwoFactor = new TWOFACTOR();
    return $TwoFactor->verifyOtp($REQ['statuscode'],$REQ['otp_input']);
}



// Function declaration end

// Function call start
if(isset($_REQUEST['sendotptouser'])){
    sendotptouser($_REQUEST);
}

if(isset($_REQUEST['verifyotp'])){
    verifyotp($_REQUEST);
}
// Function call end

?>