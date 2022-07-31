<?php 
    class conexion{
        private $usuario = "root";
        private $pass = "root";
        private $db ="prueba_tecnica_dev";
        private $host = "localhost";
        private $con;

        public function __construct(){
            $this->con = new mysqli($this->host,$this->usuario,$this->pass,$this->db);
        }

        public function obtenerDatos($sql){
            $dt = $this->con->query($sql);
            $datos = mysqli_fetch_all($dt,MYSQLI_ASSOC);
            return $datos;
        }

        public function ejecutarDatos($sql){
            $datos = $this->con->query($sql);
            return $datos;
        }

        /**
         * Funcion que consulta el listado de usuarios activos
         */
        public function consultaEmpleados($id = ''){
            
            $where = ($id != '') ? "WHERE e.id = '$id'" : '';
            
            $sql = "SELECT 
                        e.id AS id_empleado,
                        e.nombre AS nombre_empleado,
                        e.email AS email_empleado,
                        e.sexo AS sexo_empleado,
                        e.area_id,
                        a.nombre AS area_empleado,
                        e.boletin AS boletin_empleado
                    FROM empleado e 
                    INNER JOIN areas a ON e.area_id = a.id
                    $where";
            $datos = $this->obtenerDatos($sql);
            return $datos;
        }

        /**
         * Funcion que consulta las areas existentes
         */
        public function consultaAreas(){

            $sql = "SELECT * FROM areas";
            $datos = $this->obtenerDatos($sql);
            return $datos;
        }

        /**
         * Funcion que consulta las areas existentes
         */
        public function consultaRoles(){

            $sql = "SELECT * FROM roles";
            $datos = $this->obtenerDatos($sql);
            return $datos;
        }

        /**
         * Funcion que crea un nuevo empleado
         * @param String $nombre contiene el nombre del empleado
         * @param String $correo contiene el correo del empleado
         * @param String $sexo contiene el sexo del empleado
         * @param Int $area contiene el id de el area seleccionada para el empleado
         * @param String $descripcion contiene la descripcion para el empleado
         * @param Array $rol contiene el id de los roles seleccionados
         */
        public function guardaNuevoEmpleado($nombre, $correo, $sexo, $area, $descripcion, $rol){

            $sql ="INSERT INTO empleado(nombre, email, sexo, area_id, boletin, descripcion)
                    VALUES ('{$nombre}', '{$correo}', '{$sexo}', '{$area}', '1', '{$descripcion}')";
            $datos = $this->ejecutarDatos($sql);

            if($datos > 0){
                $cons = "SELECT max(id) as id FROM empleado";
                $inf = $this->obtenerDatos($cons);
                $id = $inf[0]['id'];

                foreach($rol as $r){
                    $insert = "INSERT INTO empleado_rol (empleado_id, rol_id) VALUES ('{$id}', '{$r}')";
                    $this->ejecutarDatos($insert);
                }
            }

            return $datos;
        }

        /**
         * Funcion que elimina un empleado
         * @param Int $id contiene el id del empleado
         */
        public function eliminaEmpleado($id){

            $del = "DELETE FROM empleado_rol WHERE empleado_id = '$id'";
            $this->ejecutarDatos($del);

            $sql = "DELETE FROM empleado WHERE id = '$id'";
            return $this->ejecutarDatos($sql);
        }

        /**
         * Funcion que actualiza un empleado
         * @param String $nombre contiene el nombre del empleado
         * @param String $email contiene el correo del empleado
         * @param Int $area contiene el id de el area seleccionada para el empleado
         * @param Int $boletin contiene el boletin para el empleado
         * @param Int $id contiene el id del empleado a actualizar
         */
        public function actualizaEmpleado($nombre, $email, $area, $boletin, $id){

            $sql = "UPDATE empleado SET nombre = '{$nombre}', email = '{$email}', area_id = '{$area}', boletin = '{$boletin}' WHERE id = '$id'";
            return $this->ejecutarDatos($sql);
        }

    }
    
?>