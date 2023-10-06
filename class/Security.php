<?php   

    class Security {
        public static function chiffer($password)
        {
            $_password = htmlspecialchars($password);

            return "aq47".sha1($_password."kMp87")."27";
        }
    }