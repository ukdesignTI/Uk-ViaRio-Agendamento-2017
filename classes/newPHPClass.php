<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of newPHPClass
 *
 * @author alicevianna
 */

class HelloWorld
{
    private $duuude;
    private $heyaHeya;
    
    public function getDuuude() {
        return $this->duuude;
    }

    public function getHeyaHeya() {
        return $this->heyaHeya;
    }

    public function setDuuude($duuude) {
        $this->duuude = $duuude;
        return $this;
    }

    public function setHeyaHeya($heyaHeya) {
        $this->heyaHeya = $heyaHeya;
        return $this;
    }


}
