<?php

class Utils
{

    /**
     * Get website root path.
     *
     * @return string
     */
    public static function rootpath()
    {
        return self::getHttpProtocol() . $_SERVER['HTTP_HOST'];
    }

    /**
     * Retourne le protocol utilisé web utilisé.
     * http ou https.
     *
     * @return string
     */
    public static function getHttpProtocol()
    {
        return (isset($_SERVER['HTTPS']) &&
            ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
            $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
            ? $protocol = 'https://' : $protocol = 'http://';
    }



    /**
     * Affiche des informations lisibles pour une variable.
     *
     * @param mixed $array - L'expression à afficher.
     */
    public static function print_r2($array)
    {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }

    /**
     * Retourne la date dans le bon format depuis
     * un timestamp MySQL
     *
     * @param $format    - Format de la date 12/15/2014
     * @param $timestamp - MySQL Timestamp
     *
     * @return false|string
     */
    public static function dateFromMySQL($format, $timestamp)
    {
        return date($format, strtotime($timestamp));
    }

    /**
     * Permet de faire un array_push associatif
     *
     * @param $array - Tableau au quel ajouté la ligne
     * @param $key   - Clé
     * @param $value - valeur
     *
     * @return mixed
     */
    public static function array_push_assoc($array, $key, $value)
    {
        $array[ $key ] = $value;

        return $array;
    }

    /**
     * Vérifie si l'utilisateur est identifié et si
     * il peut voir la page.
     *
     * @return bool
     */
    public static function IdentityVerification()
    {

        global $_DB;

        //Aucune variable de session user
        if (!isset($_SESSION['user'])) {
            header('Location: ' . self::rootpath() . '/login.php');
            exit;
        } //Variable de session user
        else {
            $login = $_DB->query("SELECT `pwd_hash` FROM `users` WHERE username = '" . strtoupper($_SESSION['user']['username']) . "'")->fetch_assoc();

            //Validate password hash
            if (!$login['pwd_hash'] == $_SESSION['user']['password']) {
                header('Location: ' . self::rootpath() . '/login.php');
                exit;
            } //Session limité dans le temps expiré - déconnexion
            elseif (isset($_SESSION['login_timestamp']) && time() - $_SESSION['login_timestamp'] > 300) {
                header('Location: ' . self::rootpath() . '/logout.php');
                exit;
            } //this part is only required by ckfinder and can be removed if ckfinder is removed.
            else {
                return true;
            }
        }
    }


    /**
     * Récupère l'adresse ip du visiteur.
     * Nécessite register_globals à off dans php.ini
     *
     * @return string
     */
    public static function getIP()
    {
        $ip = $_SERVER['REMOTE_ADDR'];

        return (string)$ip;
    }


    /**
     * Simple number format
     *
     * @param     $float     - Number
     * @param int $precision - Precusion
     *
     * @return string
     */
    public static function nf($float, $precision = 2)
    {
        return number_format(round($float, $precision, PHP_ROUND_HALF_EVEN), $precision, '.', ' ');
    }


    /**
     * Same as in_array but for multidimentional array
     *
     * @param      $needle
     * @param      $haystack
     * @param bool $strict
     *
     * @return bool
     */
    public static function in_array_recursive($needle, $haystack, $strict = false)
    {
        foreach ($haystack as $item) {
            if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_recursive($needle, $item, $strict))) {
                return true;
            }
        }

        return false;
    }
}

?>