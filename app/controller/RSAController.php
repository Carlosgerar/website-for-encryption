<?php
define('__ROOT__', dirname(__DIR__));

class RSAController 
{
    private function greatestCommonDivisor($a, $b){
        while($b != 0){
            $t = $a;
            $a = $b;
            $b = $t % $b;
        }
        return $a;
    }

    public function generateKeys(int $p, int $q){
        try{
            $n = $p * $q;
            $phi = ($p - 1) * ($q - 1);
        
            do {
                $e = rand(2, $phi - 1);
            } while ($this->greatestCommonDivisor($e, $phi) != 1);
        
            $d = $this->modInverse($e, $phi);
            echo json_encode( array(
                "public" => array($e, $n),
                "private" => array($d, $n)
            ));
        }catch (\Exception $e){
            return $e->getMessage();
        }

    }
    function modInverse($a, $m) {
        $m0 = $m;
        $x0 = 0;
        $x1 = 1;
        
        if ($m == 1) return 0;

        while ($a > 1) {
            $q = intdiv($a, $m);
            $t = $m;

            $m = $a % $m;
            $a = $t;
            $t = $x0;

            $x0 = $x1 - $q * $x0;
            $x1 = $t;
        }

        if ($x1 < 0) $x1 += $m0;

        return $x1;
    }
    
    function modExp($base, $exp, $mod) {
        $result = 1;
        while ($exp > 0) {
            if ($exp % 2 == 1) {
                $result = ($result * $base) % $mod;
            }
            $exp = intdiv($exp, 2);
            $base = ($base * $base) % $mod;
        }
        return $result;
    }
    public function encrypt($message, $publicKey){
        try {
            list($n, $e) = $publicKey;
            $messageBytes = unpack('C*', $message);
            $encrypted = [];
        
            foreach ($messageBytes as $byte) {
                $encrypted[] = $this->modExp($byte, $n, $e);
            }
        
            return implode(' ', $encrypted);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function decrypt($encryptedMessage, $privateKey){
        try {
            list($n, $d) = $privateKey;
            $encryptedBytes = explode(' ', $encryptedMessage);
            $decrypted = '';
        
            foreach ($encryptedBytes as $byte) {
                $decrypted .= pack('C*', $this->modExp($byte, $n, $d));
            }
        
            return $decrypted;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
$obj = new RSAController();
if(isset($_GET['method'])){
    $postMethod = $_GET['method'];

    if($postMethod == 'generateKeys'){
        $p = $_GET['num1'];
        $q = $_GET['num2'];
        $result = $obj->generateKeys($p, $q);
        echo $result;
        return;
    }
    $data = $_GET['data'];
    $globalKeys =json_decode( $_GET['globalKeys']);
    if($postMethod == 'encrypt' ){
        $result = $obj->encrypt($data, $globalKeys->public);
        echo $result;
    }elseif($postMethod == 'decrypt'){
        $result = $obj->decrypt($data, $globalKeys->private);
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
