<?
    class User{
        public $stripe;
        public $email;
        public $name;

        public $cvc;
        public $cardnr;
        public $expnr;
        public $expyear;

        public function createUser($stripe, $email, $name){
            $this->stripe = $stripe;
            $this->email = $email;
            $this->name = $name;
            $customer = $stripe->customers->create([
                "email" => $email,
                "name" => $name,
                "description" => "New member"
            ]);

            return $customer->id;
        }

        function addPaymentMetohd($stripe,$cardnr, $expnr,$expyear,$cvc,$email,$name){
            $this->stripe = $stripe;
            $this->cardnr = $cardnr;
            $this->expnr = $expnr;
            $this->expyear = $expyear;
            $this->cvc = $cvc;
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

            $card = $stripe->customers->createSource(
                $this->createUser($stripe, $email, $name),
                ['source' => $cardToken]
            );

            $method_id = $method->id;
        }
    }
?>