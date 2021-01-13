<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <?php
            class Character
            {
                private $_str;
                private $_location = "Lumbridge";
                private $_exp; 
                private $_dmg;
                private $_hp = 10;

                const LOW_STR = 20;
                const MED_STR = 50;
                const HIGH_STR = 80;

                private static $_lineToSay = 'Nice day for fishing ain\'t it ? Uh-ha !';

                public function __construct($initialStr)
                {
                    $this->setStr($initialStr);
                }

                // public function __construct($str, $dmg, $exp)
                // {
                //     $this->setStr($str);
                //     $this->setDmg($dmg);
                //     $this->setExp($exp);
                // }

                public function move() 
                {

                }

                public static function talk() 
                {
                    echo self::$_lineToSay;
                }

                public function hit(Character $targetToHit) 
                {
                    $targetToHit->_dmg += $this->_str;
                }

                public function gainExp() 
                {
                    $this->_exp++;
                }

                public function dmgCalc() 
                {
                    return $this->_dmg;
                }

                public function setStr($str)
                {
                    if (is_int($str))
                    {
                        if (in_array($str, [self::LOW_STR, self::MED_STR, self::HIGH_STR]))
                        {
                            $this->_str = $str;
                        }
                    }
                }

                public function setDmg($dmg)
                {
                    if (!is_int($dmg))
                    {
                        trigger_error('Damage has to be an integer', E_USER_WARNING);
                        return;
                    }
                }

                public function setExp($exp)
                {
                    if (!is_int($exp))
                    {
                        trigger_error('Experience must be an integer', E_USER_WARNING);
                        return;
                    }

                    if ($exp > 100)
                    {
                        trigger_error('Experience is capped at 100!', E_USER_WARNING);
                        return;
                    }

                    $this->_exp = $exp;
                }

                public function showExp()
                {
                    return $this->_exp;
                }

                public function showDmg()
                {
                    return $this->_dmg;
                }

                public function showStr()
                {
                    return $this->_str;
                }

                public function showHp()
                {
                    return $this->_hp;
                }
            }
        ?>

        <?php 
            $toon1 = new Character(Character::HIGH_STR);
            $toon2 = new Character(Character::LOW_STR);

            // $toon1->setStr(20);
            // $toon1->setExp(50);

            // $toon2->setStr(15);
            // $toon2->setExp(35);

            // $toon1->hit($toon2);
            // $toon1->gainExp();

            // $toon2->hit($toon1);
            // $toon2->gainExp();
        
            // echo 'Toon 1 has ' . $toon1->showStr() . ' strength, compared to Toon 2 who has '
            // . $toon2->showStr() . ' strength. <br />';
            // echo 'Toon 1 has gained ' . $toon1->showExp() . ' experience so far, while Toon 2 has gained '
            // .$toon2->showExp() . ' experience. <br />';
            // echo 'Toon 1 takes ' . $toon1->showDmg() . ' damage per hit. In comparison, Toon 2 suffers '
            // .$toon2->showDmg() . ' damage per swing !';

        ?>
    </body>
</html>