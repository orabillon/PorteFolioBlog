<?php   

    class Security {
        public static function chiffer($password)
        {
            try
            {
                $_password = htmlspecialchars($password);

                return "aq47".sha1($_password."kMp87")."27";
            }
            catch (Exception $ex)
            {
                throw new Exception($ex->getMessage());
            }
        }

        public static function generateSecret($Mail)
        {
           try
           {
                $_mail = htmlspecialchars($Mail);

                $_secret = sha1($_mail).time();
                $_secret = sha1($_secret).time();

                return $_secret;
           }
           catch (Exception $ex)
            {
                throw new Exception($ex->getMessage());
            }
        }
    }