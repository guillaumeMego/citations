<?php

/**
 * Permet un affichage correct de print_r
 *
 * @param array $data le tableau a afficher
 * @return void
 */
function preprint_r(array $data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}
