<?php

trait Hydrate{
    function hydrate(array $donnee){
        foreach ($donnee as $key => $value) {
            $method = 'set'.ucfirst($key);
            if(method_exist($this, $method)){
                $this->$method($value);
            }
        }
    }
}

?>