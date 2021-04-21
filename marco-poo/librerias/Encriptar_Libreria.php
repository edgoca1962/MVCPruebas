<?php
  class Encriptar_Libreria{
    private $metodo;
    private $secret_key;
    private $secret_iv;
    private $key;
    private $iv;
    private $output;
    public function __construct(){
        $this->metodo = NULL;
        $this->secret_key = NULL;
        $this->secret_iv = NULL;
        $this->key = NULL;
        $this->iv = NULL;
        $this->output = NULL;
        $this->algoritmo();
    }
    private function algoritmo(){
        $this->metodo = "AES-256-CBC";
        $this->secret_key = '$BP@2019';
        $this->secret_iv = '111319';
        $this->output = FALSE;
        $this->key = hash('sha256', $this->secret_key);
        $this->iv = substr(hash('sha256', $this->secret_iv),0,16);        
    }
    public function encriptar($dato){
        $this->output=openssl_encrypt($dato, $this->metodo, $this->key, 0, $this->iv);
        $this->output=base64_encode($this->output);
        return $this->output;
    }
    public function desencriptar($dato){
        $this->output=openssl_decrypt(base64_decode($dato), $this->metodo, $this->key, 0 , $this->iv);
        return $this->output;
    }
}