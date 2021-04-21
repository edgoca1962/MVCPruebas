<?php
  if ($peticionAjax) {
    require_once "../core/configApp.php";
  }else {
    require_once "./core/configApp.php";
  }
  class mainModel{
    
    private $enlace;
    private $respuesta;
    private $sql;
    private $output;
    private $key;
    private $iv;
    private $numero;
    private $alerta;

    protected function conectar(){
      $this->enlace = new PDO(SGBD,USER,PASS);
      return $this->enlace;
    }
    protected function ejecutar_consulta_simple($consulta){
      $this->respuesta=self::conectar()->prepare($consulta);
      $this->respuesta->execute();
      return $this->respuesta;
    }

    protected function agregar_cuenta($datos){
      $this->sql=self::conectar()->prepare("INSERT INTO cuenta(CuentaCodigo,CuentaPrivilegio,CuentaUsuario,CuentaClave,CuentaEmail,CuentaEstado,CuentaTipo,CuentaGenero,CuentaFoto) VALUES(:Codigo,:Privilegio,:Usuario,:Clave,:Email,:Estado,:Tipo,:Genero,:Foto)");
      $this->sql->bindParam("Codigo",$datos['Codigo']);
      $this->sql->bindParam("Privilegio",$datos['Privilegio']);
      $this->sql->bindParam("Usuario",$datos['Usuario']);
      $this->sql->bindParam("Clave",$datos['Clave']);
      $this->sql->bindParam("Email",$datos['Email']);
      $this->sql->bindParam("Estado",$datos['Estado']);
      $this->sql->bindParam("Tipo",$datos['Tipo']);
      $this->sql->bindParam("Genero",$datos['Genero']);
      $this->sql->bindParam("Foto",$datos['Foto']);
      $this->sql->execute();
      return $this->sql;
    }

    protected function eliminar_cuenta($codigo){
      $this->sql=self::conectar()->prepare("DELETE FROM cuenta WHERE CuentaCodigo=:Codigo");
      $this->sql->bindParam(":Codigo",$codigo);
      $this->sql->execute();
      return $this->sql;
    }

    protected function guardar_bitacora($datos){
      $this->sql=self::conectar()->prepare("INSERT INTO bitacora (BitacoraCodigo, BitacoraFecha, BitacoraHoraInicio, BitacoraHoraFinal, BitacoraTipo, BitacoraYear, CuentaCodigo) VALUES (:Codigo, :Fecha, :HoraInicio, :HoraFinal, :Tipo, :Year, :Cuenta)");
      $this->sql->bindParam(":Codigo",$datos['Codigo']);
      $this->sql->bindParam(":Fecha",$datos['Fecha']);
      $this->sql->bindParam(":HoraInicio",$datos['HoraInicio']);
      $this->sql->bindParam(":HoraFinal",$datos['HoraFinal']);
      $this->sql->bindParam(":Tipo",$datos['Tipo']);
      $this->sql->bindParam(":Year",$datos['Year']);
      $this->sql->bindParam(":Cuenta",$datos['Cuenta']);
      $this->sql->execute();
      return $this->sql;
    }

    protected function actualizar_bitacora($codigo, $hora){
      $this->sql=self::conectar()->prepare("UPDATE bitacora SET BitacoraHoraFinal = :Hora WHERE BitacoraCodigo = :Codigo");
      $this->sql->bindParam(":Hora",$hora);
      $this->sql->bindParam(":Codigo",$codigo);
      $this->sql->execute();
      return $this->sql;
    }

    protected function eliminar_bitacora($codigo) {
      $this->sql=self::conectar()->prepare("DELETE FROM bitacora WHERE CuentaCodigo = :Codigo");
      $this->sql->bindParam(":Codigo",$codigo);
      $this->sql->execute();
      return $this->sql;
    }

    public function encryption($string){
      $this->output= FALSE;
      $this->key=hash('sha256', SECRET_KEY);
      $this->iv=substr(hash('sha256', SECRET_IV),0,16);
      $this->output=openssl_encrypt($string, METHOD, $this->key, 0, $this->iv);
      $this->output=base64_encode($this->output);
      return $this->output;
    }
    protected function decryption($string){
      $this->key=hash('sha256', SECRET_KEY);
      $this->iv=substr(hash('sha256', SECRET_IV), 0, 16);
      $this->output=openssl_decrypt(base64_decode($string), METHOD, $this->key, 0 , $this->iv);
      return $this->output;
    }
    protected function generar_codigo_aleatorio($letra, $longitud, $num){
      for($i=1; $i<=$longitud; $i++){
        $this->numero=rand(0,9);
        $letra .= $this->numero;
      }
      return $letra . $num;
    }
    protected function limpiar_cadena($cadena){
      $cadena=trim($cadena);
      $cadena=stripslashes($cadena);
      $cadena=str_ireplace("<script>","",$cadena);
      $cadena=str_ireplace("</script>","",$cadena);
      $cadena=str_ireplace("<script src","",$cadena);
      $cadena=str_ireplace("<script type=","",$cadena);
      $cadena=str_ireplace("SELECT * FROM","",$cadena);
      $cadena=str_ireplace("DELETE FROM","",$cadena);
      $cadena=str_ireplace("INSERT INTO","",$cadena);
      $cadena=str_ireplace("--","",$cadena);
      $cadena=str_ireplace("^","",$cadena);
      $cadena=str_ireplace("[","",$cadena);
      $cadena=str_ireplace("]","",$cadena);
      $cadena=str_ireplace("==","",$cadena);
      $cadena=str_ireplace(";","",$cadena);
      return $cadena;
    }
    protected function sweet_alert($datos){
      if ($datos['Alerta']=="simple") {
        $this->alerta="
          <script>
            swal(
              '".$datos['Titulo']."',
              '".$datos['Texto']."',
              '".$datos['Tipo']."'
            );
          </script>
        ";
      } elseif ($datos['Alerta']=="recargar") {
        $this->alerta="
          <script>
            swal({
              title: '".$datos['Titulo']."',
              text: '".$datos['Texto']."',
              type: '".$datos['Tipo']."',
              confirmButtonText: 'Aceptar'
            }).then(function(){
              location.reload();
            });
          </script>
        ";
      } elseif ($datos['Alerta']=="limpiar") {
        $this->alerta="
          <script>
            swal({
              title: '".$datos['Titulo']."',
              text: '".$datos['Texto']."',
              type: '".$datos['Tipo']."',
              confirmButtonText: 'Aceptar'
            }).then(function(){
              $('.FormularioAjax')[0].reset();
            });
            </script>
        ";
      }
      return $this->alerta;
    }
  }