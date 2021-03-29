<?php

// First Labour : Heracles vs Nemean Lion
// use your Figher class here
require './src/Fighter.php';

/*
 * Ensuite, dans le fichier fourni index.php, créé deux instances de la classe Fighter, pour :

- 🧔 Héraclès, force de 20, dextérité de 6

- 🦁 Lion de Némée, force de 11, dextérité de 13

 */

$heracles = new Fighter("Héracles",20,6);

$lion = new Fighter("Lion de Némée",11,13);

echo '🗡️'.$heracles->getName() ."💙". $heracles->getLife()."-------------";
echo '🦁'.$lion->getName() ."💙". $lion->getLife()."<br>";

$i=1;
while($heracles->getLife()>=0 && $lion->getLife()>=0)
{
    if($heracles->getLife()==0){
        echo '💀🧔🏽 '.$heracles->getName().' is dead<br/>';
        echo '💀🦁 '.$lion->getName().' wins(💙'.$lion->getLife().')';
        exit();
    }elseif($lion->getLife()==0){
        echo '💀🦁 '.$lion->getName().' is dead<br/>';
        echo '💀🧔🏽 '.$heracles->getName().' wins(💙'.$heracles->getLife().')';
        exit();
    }else{
        $heracles->fight($lion);
        echo '<p>🧔🏽 '.
            $heracles->getName().' 🗡️ 🦁 '.$lion->getName().' 💙🦁 '.$lion->getName().' :'.$lion->getLife().'<br/>';
        $lion->fight($heracles);
        echo '🦁'.$lion->getName().' 🗡️ 🧔🏽'.$heracles->getName().' 💙️🧔🏽 '.$heracles->getName().' :'.$heracles->getLife().
            '<br/>Round #'.$i.'</p>';
        $i++;
    }

}

