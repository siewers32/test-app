<?php


namespace App\Http\Lib;
class Abilities
{
    public function getAbilities($role) {
        $abilities =  [
          'admin' => ['edit-any', 'create', 'destroy-any'],
          'user' => ['edit-own', 'create'],
          'editor'  => ['edit-any']
        ];
        if(in_array($role, array_keys($abilities))) {
            return $abilities[$role];
        } else {
            return array();
        }
    }
}
