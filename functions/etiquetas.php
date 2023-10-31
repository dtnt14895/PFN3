<?php
function EtiquetaPermiso($valor)
{
    switch ($valor) {
        case 1:
            return '<span class="font-bold rounded h-fit px-1 bg-yellow-400 text-black">Administrador</span>';
        case 2:
            return '<span class="font-bold rounded h-fit px-1 bg-blue-500 text-white">Maestro</span>';
        case 3:
            return '<span class="font-bold rounded h-fit px-1 bg-gray-500 text-white">Alumno</span>';
        default:
            return '<span class="font-bold rounded h-fit px-1 bg-red-500 text-black">Valor no válido</span>';
    }
}

function EtiquetaEstado($valor)
{
    return $valor ? '<span class="font-bold rounded h-fit px-1 bg-green-500 text-white">Activo</span>'
                  : '<span class="font-bold rounded h-fit px-1 bg-red-500 text-white">Inactivo</span>';
}

function EtiquetaClaseAsignada($valor)
{
    if ($valor == null || $valor == "") {
        return '<span class="font-bold rounded h-fit px-1 bg-yellow-400 text-black">Sin Asignación</span>';
    } else {
        $output = '<span>';
        
        if (is_array($valor)) {
            $output .= implode(', ', $valor); // Implode array values with a comma
        } else {
            $output .= $valor; // Use the value directly if it's not an array
        }
        
        $output .= '</span>';
        return $output;
    }
}


function EtiquetaMensaje($valor)
{
    return $valor  ? '<span>'.$valor.'</span>'
    :  '<span class="font-bold rounded h-fit px-1 bg-blue-500 text-white">No hay menaje</span>';
}

function EtiquetaCalificaion($valor)
{
    return $valor  ? '<span>'.$valor.'</span>'
    :  '<span class="font-bold rounded h-fit px-1 bg-yellow-400 text-black">Sin calificacion</span>';
}

function EtiquetaProfesorAsignado($valor)
{
    if ($valor == null || $valor == "") {
        return '<span class="font-bold rounded h-fit px-1 bg-yellow-400 text-black">Sin Asignación</span>';
    } else {
        return $valor;
    }
}
function EtiquetaCantiodadAlumno($valor)
{
    if ($valor == null || $valor == "" || $valor == 0) {
        return '<span class="font-bold rounded h-fit px-1 bg-yellow-400 text-black">Sin Alumnos</span>';
    } else {
        return $valor;
    }
}


?>