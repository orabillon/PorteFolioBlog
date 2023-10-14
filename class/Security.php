<?php   

    class Security {
        public static function chiffer($password)
        {
            $_password = htmlspecialchars($password);

            return "aq47".sha1($_password."kMp87")."27";
        }

        public static function generateSecret($Mail)
        {
            $_mail = htmlspecialchars($Mail);

            $_secret = sha1($_mail).time();
		    $_secret = sha1($_secret).time();

            return $_secret;
        }
    }