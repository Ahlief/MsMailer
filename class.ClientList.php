<?php
	/**
	 * ClientList - Consultor de base de datos de clientes, generador de enlaces para desubscribir y procesador de peticiones.
	 * @author Oscar G.
	 */
	class ClientList
	{
            protected $conexion;
            private $secret_string 	= "16ba1df7b92894b7f743d9ef3f6f2d4a";
            private $unsubscription_folder 	= "/Msmailer";      // Dejar en blanco en caso de estar en el directorio raiz del servidor
            private $dominio                    = "yoquese.com";    // $_SERVER['SERVER_NAME'];			//Host del servidor
            private $protocolo                  = "http";               // http o https 
            private $hosting ="";
            /**
	     * Constructor.
	     */
	    public function __construct()
            {
                $bdhost = "localhost";		//Servidor
                $bduser = "root";		//Usuario de bbdd
                $bdpass = "root";		//Contraseña de bbdd
                $bbdd 	= "mailer";		//Nombre de la bbdd
                $this->conexion = new mysqli($bdhost,$bduser,$bdpass,$bbdd);
                $this->hosting = $this->protocolo."://".$this->dominio;
            }

            /**
	     * Obtener el host del servidor  
	     * @access public
	     * @return string
	     */
            public function getHosting()
            {
                return $this->hosting;
            }

            /**
	     * Lista absolutamente todos los clientes de la base de datos 
	     * y devuelve el array del contenido.
	     * @access public
	     * @return array
	     */
            public function listarClientes()
            {
                $query = "SELECT * 
                            FROM clientes;";
                $result = $this->conexion->query($query);
                return $result;
            }
			
            /**
	     * Lista sólo los clientes de la base de datos 
	     * subscritos (status=1) y devuelve el array del contenido.
	     * @access public
	     * @return array
	     */	
            
            public function getListaEnviados() 
            {
                //lista todos los registros de la bbdd
                $query = "SELECT * 
                            FROM clientes 
                            WHERE status=1;";
                $result = $this->conexion->query($query);
                return $result;
            } 
            
             /**
	     * Agrega un nuevo registro de correo enviado a la base de datos 
             * envios(correo,fecha); 
	     * @access public
	     * @return void
	     */	
            public function addEnviado($correo) 
            {
                //lista todos los registros de la bbdd
                $query = "INSERT INTO envios(id, fecha, correo)
                            VALUES(0,now(),".$correo.");";
                
                $result = $this->conexion->query($query);
                return $result;
            } 

            public function addError($correo) 
            {
                //lista todos los registros de la bbdd
                $query = "INSERT INTO errores(id, fecha, correo)
                            VALUES(0,now(),".$correo.");";
                
                $result = $this->conexion->query($query);
                return $result;
            } 
            
            /**
	     * Lista sólo los clientes de la base de datos 
	     * subscritos (status=1) y devuelve el array del contenido.
	     * @access public
	     * @return array
	     */	
            public function getClientesSubscritos() 
            {
                //lista todos los registros de la bbdd
                $query = "SELECT * 
                            FROM clientes 
                            WHERE status=1;";
                $result = mysqli_query($this->conexion, $query);
                return $result;
            }

            /**
	     * Comprueba la url de desubscripción y en caso de 
	     * cotejamiento exitoso, aplica la modificación del estado en la 
             * base de datos.
	     * @param string user_id 
	     * @param string validation_hash      
	     * @access private
	     * @return void
	     */	
            private function unsubscribe($user_id, $verification_hash) 
            {
                $cotejamiento = md5( $user_id . $this->secret_string );

                if( $verification_hash != $cotejamiento ) {
                    return false;
                }
                $query = "UPDATE clientes 
                            SET status = 0 
                            WHERE id = " . $user_id;
               $result = $this->conexion->query($query);
                return $result;
            }

            /** 
	     * Verifica que existe una coincidencia en la clave secreta y 
             * ejecuta la desubscripcion
	     * @param string user_id 
	     * @param string validation_hash 
	     * @access public
	     * @return void
	     */			
            public function checkSubscription($user_id, $verification_hash) 
            {
                if( $this->unsubscribe($user_id, $verification_hash) ) {
                    print ("Te has desubscrito a este boletín.");	
                }
                else {
                    print("El usuario no se encuentra en la base de datos o ya está desubscrito");
                }
            }

            /**
	     * Genera un enlace de desubscripción valiendose por la clave secreta. 
	     * @param string user_id 
	     * @param string validation_hash 
	     * @access public
	     * @return string
	     */	
            public function linkmaker($user_id)
            {
                $link = $this->protocolo."://".
                        $this->dominio.
                        $this->unsubscription_folder.
                        "/unsubscribe.php?i=".$user_id.
                        "&vh=".md5($user_id.$this->secret_string);
                return $link;
            }
	}
