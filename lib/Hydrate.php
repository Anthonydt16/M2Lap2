<?php
trait Hydrate{
    function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            //echo "$key $value \n";
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }
}
