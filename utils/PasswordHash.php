<?php


abstract class PasswordHash
{
    public static function passwordToHash(string $mdp){
        return sha1($mdp);
    }
}