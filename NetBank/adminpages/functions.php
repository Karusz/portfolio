<?php
    function CodeGenerate($length){
        $chars = '1234567890';
        $charsLength = strlen($chars);
        $code = "";
        for($i=0;$i<$length;$i++){
            $code .= $chars[random_int(0, $charsLength-1)];
        }
        return $code;
    }

    function SzamlaGenerate(){
        $szamlaszam = CodeGenerate(8);
        while($szamlaszam[0] == '0'){
            $szamlaszam = CodeGenerate(8);
        }
        $szamlaszam .= "-".CodeGenerate(8)."-".CodeGenerate(8);
        return $szamlaszam;
    }

    function CardGenerate(){
        $kartyaszam = CodeGenerate(4);
        $kartyaszam .= "-".CodeGenerate(4)."-".CodeGenerate(4)."-".CodeGenerate(4);
        return $kartyaszam;
    }

?>