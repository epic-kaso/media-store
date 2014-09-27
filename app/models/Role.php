<?php

    use Zizaco\Entrust\EntrustRole;

    class Role extends EntrustRole
    {

        public static function init(){
            //Role::truncate();
            $owner = new Role;
            $owner->name = 'Owner';
            $owner->save();

            $admin = new Role;
            $admin->name = 'Admin';
            $admin->save();

            $consumer = new Role;
            $consumer->name = 'Consumer';
            $consumer->save();

            $consumer = new Role;
            $consumer->name = 'MediaPartner';
            $consumer->save();
        }

        public static function getAdmin(){
            return static::getByName('Admin');
        }

        public static function getConsumer(){
            return static::getByName('Consumer');
        }

        public static function getOwner(){
            return static::getByName('Owner');
        }

        public static function getMediaPartner(){
            return static::getByName('MediaPartner');
        }

        private static function getByName($name){
            return static::where('name',$name)->first();
        }
    }