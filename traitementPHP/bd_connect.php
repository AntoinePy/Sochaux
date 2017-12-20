<?php
/**
 * Created by PhpStorm.
 * User: Lucas - Mystiikk
 * Date: 12/12/2017
 * Time: 15:56
 */

function bd_connection($adress="localhost", $user="root", $password="", $name="baselucas") {
    return mysqli_connect($adress, $user, $password, $name);
}
