<?php

namespace App\Helpers; // Esta linea define el espacio de nombres del archivo, que es App\Helpers. Esto permite organizar el código y evitar conflictos de nombres con otras clases.

class EstadoIdea // Esta linea define la clase EstadoIdea, que contiene métodos relacionados con los estados de las ideas.
{
    public static function opciones(): array // Esta linea define un método estático llamado opciones que devuelve un arreglo. Los métodos estáticos se pueden llamar sin crear una instancia de la clase.
    {
        return [
            'registrada' => 'Registrada',
            'en_proceso' => 'En proceso',
            'finalizada' => 'Finalizada',
        ];
    }
}