<?php

require_once "../controllers/usuariosController.php";
require_once "../model/usuarioModel.php";

class AjaxUsuarios{

    /*=============================================
    VALIDAR EMAIL EXISTENTE
    =============================================*/

    public $validarEmail;

    public function ajaxValidarEmail(){

        $datos = $this->validarEmail;

        $respuesta = ControladorUsuarios::ctrMostrarUsuarios("email", $datos);

        echo json_encode($respuesta);

    }
    /*=============================================
    VALIDAR EMAIL EXISTENTE
    =============================================*/
    public $email;
    public $nombre;
    public $foto;

    public function ajaxRegistroFacebook(){ 

        $datos = array("nombre"=> $this->nombre,
                        "email"=> $this->email,
                        "foto"=> $this->foto,
                        "password"=> "null",
                        "modo"=>"facebook",
                        "verificacion"=> 0,
                        "emailEncriptado"=> "null"
    );
        $respuesta = ControladorUsuarios::crtRegistroRedesSociales($datos);

        echo $respuesta;
    } 
    /*=============================================
    VALIDAR EMAIL EXISTENTE
    =============================================*/
}
    if(isset($_POST["validarEmail"])){
        $valEmail = new AjaxUsuarios();
        $valEmail -> validarEmail = $_POST["validarEmail"];
        $valEmail -> ajaxValidarEmail();
    }
    /*=============================================
    REGISTRO CON FACEBOOK
    =============================================*/
    if(isset($_POST["email"])){
        $regFacebook = new AjaxUsuarios();
        $regFacebook -> email = $_POST["email"];
        $regFacebook -> nombre = $_POST["nombre"];
        $regFacebook -> foto = $_POST["foto"];
        $regFacebook -> ajaxRegistroFacebook();
    }

?>
