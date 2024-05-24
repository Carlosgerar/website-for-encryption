<?php
define('__ROOT__', dirname(__DIR__));

class RSAController 
{
    private string $key = '123';
    
    public function encrypt($datos){
        try {
            //convierto la llave en un array de bytes
            $keyBytes = str_split($this->key);
            //convierto los datos en un array de bytes
            $dataBytes = str_split($datos);

            //variable para almacenar los datos encriptados
            $encryptedData = '';
            //variable para almacenar el indice de la llave
            $keyIndex = 0;
            //recorro $datos
            foreach ($dataBytes as $byte) {
                //aplico el algoritmo XOR para encriptar
                $encryptedByte = ord($byte) ^ ord($keyBytes[$keyIndex]);
                //concateno el byte encriptado
                $encryptedData .= chr($encryptedByte);

                // Ciclo la clave para aplicarla a cada byte de datos
                $keyIndex = ($keyIndex + 1) % count($keyBytes);
            }
            //retorno los datos encriptados
            return base64_encode($encryptedData);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function decrypt($datos){
        try {
            //convierto la llave en un array de bytes
            $keyBytes = str_split($this->key);
            $encryptedBytes = base64_decode($datos);
            //variable para almacenar los datos desencriptados
            $decryptedData = '';
            //variable para almacenar el indice de la llave
            $keyIndex = 0;
    
            //recorro str_split($encryptedBytes) 
            foreach (str_split($encryptedBytes) as $byte) {
                //aplico el algoritmo XOR para desencriptar
                $decryptedByte = ord($byte) ^ ord($keyBytes[$keyIndex]);
                //concateno el byte desencriptado
                $decryptedData .= chr($decryptedByte);
    
                // Ciclo la clave para aplicarla a cada byte de datos
                $keyIndex = ($keyIndex + 1) % count($keyBytes);
            }
            //retorno los datos desencriptados
            return $decryptedData;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
$obj = new RSAController();

if(isset($_GET['method'])){
    $postMethod = $_GET['method'];
    $data = $_GET['data'];

    if($postMethod == 'encrypt' ){
        $result = $obj->encrypt($data);
        echo $result;
    }else{
        $result = $obj->decrypt($data);
        echo $result;
    
    }
}
/**
 * @param string $message
 * @param string $data
 * @return json_encode
 */
function message($message, $data){
    $array = array(
        "message" => $message,
        "data" => $data,
    );
    echo json_encode($array);
}
