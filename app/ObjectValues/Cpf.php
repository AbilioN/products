<?php 

namespace App\ObjectValues;
use Exception;
class Cpf
{

    private string $cpf;

    function __construct(string $cpf)
    {
        if(!$this->validateCpf($cpf))
        {
            throw new Exception('Cpf is not valid');
        }

        $this->cpf = $this->removeCpfMask($cpf);
    }

    public function __toString() : string
    {
        return $this->cpf;
    }

    function validateCpf($cpf) : bool {

        // https://dev.to/alexandrefreire/funcao-em-php-para-validar-cpf-3kpd
        $cpf = $this->removeCpfMask($cpf);
    
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
    
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
    
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    
    }

    function removeCpfMask($cpf) : string
    {
        return preg_replace( '/[^0-9]/is', '', $cpf );
    }
}