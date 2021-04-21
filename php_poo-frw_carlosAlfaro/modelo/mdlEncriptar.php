<?php
  class mdlEncriptar{
    private $metodo;
    private $secret_key;
    private $secret_iv;
    public $output;
    private $key;
    private $iv;
    public function mdlEncriptar($encripta,$dato){
        $this->metodo = "AES-256-CBC";
        $this->secret_key = '$BP@2019';
        $this->secret_iv = '111319';
        $this->output = FALSE;
        $this->key = hash('sha256', $this->secret_key);
        $this->iv = substr(hash('sha256', $this->secret_iv),0,16);
        if ($encripta) {
            return self::encriptar($dato);
        } else {
            return self::desencriptar($dato);
        }
    }
    private function encriptar($dato){
        $this->output=openssl_encrypt($dato, $this->metodo, $this->key, 0, $this->iv);
        $this->output=base64_encode($this->output);
        return $this->output;
    }
    private function desencriptar($dato){
        $this->output=openssl_decrypt(base64_decode($dato), $this->metodo, $this->key, 0 , $this->iv);
        return $this->output;
    }
}