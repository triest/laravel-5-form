<?php
    /**
     * Created by PhpStorm.
     * User: triest
     * Date: 29.03.2020
     * Time: 14:20
     */

    namespace App;


    abstract class FactoryAbstract
    {

        public function create($type)
        {
            switch ($type) {
                case'Bid':
                    return $this->creareBid();
                default:
                    return $this->creareBid();
            }
        }

        public function creareBid(){
            return new Bid();
        }
    }