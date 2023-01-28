<?php
    namespace jwt;

    class jwt {
        public $id;
        public $name;
        public $secret_key;

        public function __construct($id,$name,$secret_key) {
            $this->name = $name;
            $this->id = $id;
            $this->secret_key = $secret_key;
        }

        public function generate(){
            $header = $this->base64UrlEncode('{"alg": "HS256", "typ": "JWT"}');
            $payload = $this->base64UrlEncode('{"name": "'.$this->get_name().'","id": "'.$this->get_id().'","iat": "'.time().'"}');
            $secret = $this->base64UrlEncode(hash_hmac('sha256', $header.'.'.$payload,$this->get_secret_key(),true));
            return $header.'.'.$payload.'.'.$secret;
        }

        public function base64UrlEncode($data){
            return str_replace(['+', '/', '='], ['-','_',''], base64_encode($data));
        }

        public function get_name() {
            return $this->name;
        }

        public function get_id() {
            return $this->id;
        }

        public function get_secret_key() {
            return $this->secret_key;
        }
    }

    class verify_jwt{
        public $token;
        private $secret_key;

        public function __construct($token,$secret_key) {
            $this->token = $token;
            $this->secret_key = $secret_key;
        }

        public function verify(){
            $parts = explode('.',$this->token);
            $secret = $this->base64UrlEncode(hash_hmac('sha256', $parts[0].'.'.$parts[1],$this->get_secret_key(),true));

            if($secret == $parts[2]){
                $payload = json_decode(base64_decode($parts[1]));
                return json_encode(['status' => true,'id' => $payload->id, 'name' => $payload->name,'iat' => $payload->iat]);
            }
            return json_encode(['status' => false]);
        }

        public function base64UrlEncode($data){
            return str_replace(['+', '/', '='], ['-','_',''], base64_encode($data));
        }

        public function get_token() {
            return $this->token;
        }

        public function get_secret_key() {
            return $this->secret_key;
        }
    }
?>