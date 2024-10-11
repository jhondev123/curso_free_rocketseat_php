<?php

namespace App;

enum ProjectStatus: string
{
    case Open = 'open';
    case Closed = 'closed';

    public function label()
    {
        if($this->value === self::Open) {
            return 'Aceitando propostas';
        }
        if ($this->value === self::Closed) {
            return 'Projeto finalizado';
        }

    }
}
