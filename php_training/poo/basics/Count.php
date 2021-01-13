<?php
    class Count
    {
        private static $_countEcho = 0;

        public function __construct()
        {
            self::$_countEcho++;
        }

        public static function getCount()
        {
            return self::$_countEcho;
        }
    }
?>