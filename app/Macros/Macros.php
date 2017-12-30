<?php

namespace App\Macros;

use Collective\Html\FormBuilder;

class Macros extends FormBuilder
{

    public function selectstate($name, $selected = null, $options = array())
    {
        $list = [
            ''   => 'seleccione una opcion',
            'Mn' => 'Managua',
            'My' => 'Masaya',
        ];
        return $this->select($name, $list, $selected, $options)
    }

}
