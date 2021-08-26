<?php 

namespace App\Utils;

class Util
{
    public function validate($value)
    {
        return $this->isValidate($value);
    }

    protected function isValidate($value)
    {
        $c = preg_replace('/\D/', '', $value);
        if (strlen($c) != 11 || preg_match("/^{$c[0]}{11}$/", $c)) {
            return false;
        }
        for ($s = 10, $n = 0, $i = 0; $s >= 2; $n += $c[$i++] * $s--);
        if ($c[9] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
            return false;
        }
        for ($s = 11, $n = 0, $i = 0; $s >= 2; $n += $c[$i++] * $s--);
        if ($c[10] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
            return false;
        }
        return true;
    }

    /**
    * Formata uma string segundo a máscara de CPF
    * caso o tamanho da string seja diferente de 11, a string será retornada sem formatação
    * @param string $cpf
    * @return string
    */
    public function cpfMascara($cpf) {
        if (! $cpf) {
            return '';
        }
        if (strlen($cpf) == 11) {
            return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9);
        }
        return $cpf;
    }

}