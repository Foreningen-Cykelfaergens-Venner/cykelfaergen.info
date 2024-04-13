 <?
    require(dirname(__DIR__, 2)."/init.php"); // Going up two folders from file directory!

    if(isset($_POST["email"])){
        $email = mysqli_escape_string($db, base64_encode($_POST["email"]));
        $name = mysqli_escape_string($db,base64_encode($_POST["name"]));

        $street = mysqli_escape_string($db, base64_encode($_POST["street"]));
        $city = mysqli_escape_string($db, base64_encode($_POST["city"]));
        $postalCode = mysqli_escape_string($db, base64_encode($_POST["postcode"]));
        $country = mysqli_escape_string($db, base64_encode($_POST["country"]));

        if(isset($_POST["newsletter"]) && $_POST["newsletter"] !=""){
            $mailchimpMail = base64_decode($_POST["email"]);
            $api_key = MAILCHIMP__API_KEY;
            $audienceKey = MAILCHIMP__LIST_KEY;
            
            $data_center = substr($api_key,strpos($api_key,'-')+1);
 
            $url = 'https://'. $data_center .'.api.mailchimp.com/3.0/lists/'. $audienceKey .'/members';
            
            $json = json_encode([
                'email_address' => $mailchimpMail,
                'status'        => 'subscribed', //pass 'subscribed' or 'pending'
            ]);
            
            try {
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $api_key);
                curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
                $result = curl_exec($ch);
                $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);
                if (200 == $status_code) {
                    //echo "The user added successfully to the MailChimp.";
                }
            } catch(Exception $e) {
                echo $e->getMessage();
            }
        }

        if(isset($_POST["cardnumber"]) && isset($_POST["expmonth"]) && isset($_POST["expyear"]) && isset($_POST["cvv"]) && !isset($_POST["cardId"]) && !isset($_POST["stripeCustomer"])){
            $cardnr =  mysqli_escape_string($db,$_POST["cardnumber"]);
            $expnr = mysqli_escape_string($db,$_POST["expmonth"]);
            $expyear = mysqli_escape_string($db,$_POST["expyear"]);
            $cvc = mysqli_escape_string($db,$_POST["cvv"]);
        }

        $product = mysqli_escape_string($db,"Passiv Medlem");

        $amount = $_POST["amount"];
        $amount = str_replace(",","",$amount);

        $stripe = new \Stripe\StripeClient(STRIPE_API_KEY);

        try {

            if(!isset($_POST["prodcut_id"])){
                $stripeProduct = \Stripe\Product::create([
                    'name' => $product,
                ]);
    
                $price = \Stripe\Price::create([
                    'product' => $stripeProduct->id,
                    'unit_amount' => $amount,
                    'currency' => 'dkk'
                ]);
                $productId = $stripeProduct->id;
            }else{
                $productId = $_POST["prodcut_id"];
            }
            
            if(isset($_POST["cardId"]) && isset($_POST["stripeCustomer"]) && isset($_POST["stripeSubsId"])){
                $customer__id = base64_decode($_POST["stripeCustomer"]);
                $method_id = base64_decode($_POST["cardId"]);
                $stripeSubsId = base64_decode($_POST["stripeSubsId"]);
            }else{
                $customer = $stripe->customers->create([
                    "email" => base64_decode($email),
                    "name" => base64_decode($name),
                    "description" => "New Member",
                    "address" => [
                        "city" => base64_decode($city),
                        "country" => base64_decode($country),
                        "line1" => base64_decode($street),
                        "postal_code" => base64_decode($postalCode),
                        "state" => base64_decode($country),
                    ]
                ]);
                
                $customer__id = $customer->id;

                $cardToken = $stripe->tokens->create([
                    'card' => [
                        'number' => $cardnr,
                        'exp_month' => intval($expnr),
                        'exp_year' => intval($expyear),
                        'cvc' => $cvc
                    ],
                ]);
                
                $method = $stripe->paymentMethods->create([
                    'type' => 'card',
                    'card' => [
                        'number' => $cardnr,
                        'exp_month' => intval($expnr),
                        'exp_year' => intval($expyear),
                        'cvc' => $cvc
                    ],
                ]);

                $method_id = $method->id;

                $card = $stripe->customers->createSource(
                    $customer__id,
                    ['source' => $cardToken]
                );
            }

            if(!isset($_POST["stripeSubsId"]) || $_POST["stripeSubsId"] == ""){
                $subscription = $stripe->subscriptions->create([
                    'customer' => $customer__id,
                    'items' => [
                        [
                            'price_data' => [
                                'currency' => 'dkk',
                                'product' => $productId,
                                'recurring' => [
                                    "interval" => "year",
                                    'interval_count' => 1
                                ],
                                'unit_amount' => $amount
                            ]
                        ],
                    ],
                    'payment_settings' =>[
                        'payment_method_types'=>['card']
                    ]
                ]);
            }

            if(isset($_POST["cardId"]) && isset($_POST["stripeCustomer"]) && !isset($_POST["stripeSubsId"])){
                if($subscription->status == "active"){
                    $success = true;
                }
            }else if(isset($_POST["stripeSubsId"]) && $_POST["stripeSubsId"] != ""){
                $success = true;
            }else{
                if($subscription->status == "active"){
                    $stripeSubsId = mysqli_escape_string($db, base64_encode($subscription->id));
                    $customer__id = mysqli_escape_string($db, base64_encode($customer__id));
                    $cardId = mysqli_escape_string($db, base64_encode($card->id));

                    if(isset($_POST["password"]) && $_POST["password"] !== ""){
                        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                    }else{
                        $password = "";
                    }
                    
                    if(!isset($_POST["exists"])){
                        $member_since = date("Y-m-d H:m:i");
                        $sql = "INSERT INTO medlemmer(stripe__id, email, username, stripe_subs_id, card_id, password, street, city, postcode, country, member_since) VALUES('$customer__id', '$email', '$name', '$stripeSubsId', '$cardId', '$password', '$street', '$city', '$postalCode', '$country', '$member_since')";
                    }else{
                        $sql = "UPDATE medlemmer SET stripe__id='$customer__id', stripe_subs_id='$stripeSubsId', card_id='$cardId' WHERE email='$email'";
                    }

                    $query = mysqli_query($db, $sql);

                    if($query){
                        $success = true;
                    }else{
                        $error = mysqli_error($db);
                    }

                }
            }
        } catch(Stripe_CardError $e) {
            // Since it's a decline, Stripe_CardError will be caught
            $body = $e->getJsonBody();
            $err  = $body['error'];
        
            print('Status is:' . $e->getHttpStatus() . "\n");
            print('Type is:' . $err['type'] . "\n");
            print('Code is:' . $err['code'] . "\n");
            // param is '' in this case
            print('Param is:' . $err['param'] . "\n");
            print('Message is:' . $err['message'] . "\n");
            $error = $err['message'];
            $success = false;
        } catch (Stripe_InvalidRequestError $e) {
            // Invalid parameters were supplied to Stripe's API
            $body = $e->getJsonBody();
            $err  = $body['error'];
            $success = false;
            $error = $err["message"];
        } catch (Stripe_AuthenticationError $e) {
            // Authentication with Stripe's API failed
            // (maybe you changed API keys recently)
            $body = $e->getJsonBody();
            $err  = $body['error'];
            $success = false;
            $error = $err["message"];
        } catch (Stripe_ApiConnectionError $e) {
            // Network communication with Stripe failed
            $body = $e->getJsonBody();
            $err  = $body['error'];
            $success = false;
            $error = $err["message"];
        } catch (Stripe_Error $e) {
            // Display a very generic error to the user, and maybe send
            // yourself an email
            $body = $e->getJsonBody();
            $err  = $body['error'];
            $success = false;
            $error = $err["message"];
        } catch (Exception $e) {
            // Something else happened, completely unrelated to Stripe
            $body = $e->getJsonBody();
            $err  = $body['error'];
            $success = false;
            $error = $err["message"];
        }
        if($success){
            echo "Subscribed";
        }else{
            echo $error;
        }
    }else{
        echo "Some data are missing";
    }
?>