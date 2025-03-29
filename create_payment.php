<?php
require_once'session.php';
  require_once'class.php';
  $db=new db_class();         



$name = $db->user_acc($_SESSION['user_id']);
$amount = $_POST['amount1'];



// Replace with your PayMongo Secret Key
$secretKey = "sk_test_n5tFDTsY4TKwDVvJDxcUmyfD";

// Collect form data
$amount_init = $amount;
$amount = $amount_init * 100; // Convert to centavo


// Define the data payload for creating a Payment Link
$data = [
    "data" => [
        "attributes" => [
            "amount" => $amount,
            "currency" => "PHP",
            "description" => "Loan Payment",
            "remarks" => "Payment for Borrower's Loan",
            "checkout_url" => "https://pm.link/org-sBNv7gWdxikVStjWLa5zEfBt/test/Yxj6GJs"
        ]
    ]
];

// Initialize cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.paymongo.com/v1/links");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Basic " . base64_encode($secretKey . ":")
]);

// Execute the cURL request
$result = curl_exec($ch);



curl_close($ch);

// Decode the response
$response = json_decode($result, true);


$conn = mysqli_connect('localhost','root','');
       $db = mysqli_select_db($conn, 'cmdl');

       


// Check if the Payment Link was created successfully
if (isset($response['data']['attributes']['checkout_url'])) {
    // Redirect to the checkout URL for payment
    header("Location: " . $response['data']['attributes']['checkout_url']);

    //TO GET PAYMENT REFERENCE LINK
 
       
       

       if(isset($_POST["pay"])){
         $connections = mysqli_connect("localhost","root","","cmdl");
       
         
         $refno = $_POST['refno1'];
             $amount = $_POST['amount1'];

         $date = date('Y-m-d');
         $date1 = date('dmYhiA');
         $user_pass = $_SESSION['pass'];
         $onlineID = "OL-" . $date1;
         $vehicle_inf = $_POST['vehicleinf'];
         $dateinput = $_POST['setDate1'];
         $dateform = date('Y-m-d', strtotime($dateinput));
         $parkslot = $_POST['parkslot'];
         $plateno = $_SESSION["plateno"];
         $linkref = $response['data']['attributes']['checkout_url'];
         $refcode = substr($linkref, -7);
       
         $query = "INSERT INTO user_payment (name, refno, amountpaid,duedate,
         datepaid,linkreference,refcode,status) 
         VALUES ('$name', '$refno', '$amount','$dateinput','$date','$linkref','$refcode','PAID')";
       $query_exec = mysqli_query($conn,$query);
       if($query_exec){
       
        $retrieve_query1 = mysqli_query($conn, "SELECT * FROM monthly_payment_tbl WHERE name = '$name' AND refno ='$refno' ");
                                    while($row =mysqli_fetch_assoc($retrieve_query1)){
                                            $months = $row['months'];
                                            $p1 = $row['payment1'];
                                            $p2 = $row['payment2'];
                                            $p3 = $row['payment3'];
                                            $p4 = $row['payment4'];
                                            $p5 = $row['payment5'];
                                            $p6 = $row['payment6'];
                                            $p7 = $row['payment7'];
                                            $p8 = $row['payment8'];
                                            $p9 = $row['payment9'];
                                            $p10 = $row['payment10'];
                                            $p11 = $row['payment11'];
                                            $p12 = $row['payment12'];


                                        



                                        if($dateinput == $p1){

       $query = "UPDATE monthly_payment_tbl SET payment1_status='PAID' WHERE name='$name' AND refno = '$refno' ";
       $query_exec = mysqli_query($conn,$query);
        
        }else if($dateinput == $p2){

       $query = "UPDATE monthly_payment_tbl SET payment2_status='PAID' WHERE name='$name' AND refno = '$refno' ";
       $query_exec = mysqli_query($conn,$query);
        
        }else if($dateinput == $p3){

       $query = "UPDATE monthly_payment_tbl SET payment3_status='PAID' WHERE name='$name' AND refno = '$refno' ";
       $query_exec = mysqli_query($conn,$query);
        
        }else if($dateinput == $p4){

       $query = "UPDATE monthly_payment_tbl SET payment4_status='PAID' WHERE name='$name' AND refno = '$refno' ";
       $query_exec = mysqli_query($conn,$query);
        
        }else if($dateinput == $p5){

       $query = "UPDATE monthly_payment_tbl SET payment5_status='PAID' WHERE name='$name' AND refno = '$refno' ";
       $query_exec = mysqli_query($conn,$query);
        
        }else if($dateinput == $p6){

       $query = "UPDATE monthly_payment_tbl SET payment6_status='PAID' WHERE name='$name' AND refno = '$refno' ";
       $query_exec = mysqli_query($conn,$query);
        
        }else if($dateinput == $p7){

       $query = "UPDATE monthly_payment_tbl SET payment7_status='PAID' WHERE name='$name' AND refno = '$refno' ";
       $query_exec = mysqli_query($conn,$query);
        
        }else if($dateinput == $p8){

       $query = "UPDATE monthly_payment_tbl SET payment8_status='PAID' WHERE name='$name' AND refno = '$refno' ";
       $query_exec = mysqli_query($conn,$query);
        
        }else if($dateinput == $p9){

       $query = "UPDATE monthly_payment_tbl SET payment9_status='PAID' WHERE name='$name' AND refno = '$refno' ";
       $query_exec = mysqli_query($conn,$query);
        
        }else if($dateinput == $p10){

       $query = "UPDATE monthly_payment_tbl SET payment10_status='PAID' WHERE name='$name' AND refno = '$refno' ";
       $query_exec = mysqli_query($conn,$query);
        
        }else if($dateinput == $p11){

       $query = "UPDATE monthly_payment_tbl SET payment11_status='PAID' WHERE name='$name' AND refno = '$refno' ";
       $query_exec = mysqli_query($conn,$query);
        
        }else if($dateinput == $p12){

       $query = "UPDATE monthly_payment_tbl SET payment12_status='PAID' WHERE name='$name' AND refno = '$refno' ";
       $query_exec = mysqli_query($conn,$query);
        
        }

}








       
       }else{
       echo "FAILED SA IF";
       }
         }
         

    exit();
    
} else {
    // Output the error if there was an issue creating the Payment Link
    echo "Error creating payment link: " . print_r($response, true);
   
/*    $query = "INSERT INTO test_db(response) VALUES ('". $response['data']['attributes']['checkout_url'] ."')";
    $query_exec = mysqli_query($conn,$query);
    if($query_exec){
     echo "SUCCESS SA IF";
    }else{
     echo "FAILED SA IF";
    } */
}







$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.paymongo.com/v1/links/link_ZgLNEffT6evoiMyn3St8ZGHa",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
    "accept: application/json",
    "authorization: Basic c2tfdGVzdF9VQ1RueGRuMkJ5aDdwbWNXTDJxTTFZQk46"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

       


