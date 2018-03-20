<?php

require ("../config.php"); // get database credentials
Class Db {
    //TODO: add special character removal to class

    public $dbh;

    function __construct()
    {
        try{
            //attemps to connect to DB
            $this->dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . "", DB_USER, DB_PASSWORD);

            //attemps to set options (attributes) for database
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch (Exception $e){

            //on error exit and display error message
            die($e->getMessage());

        }
    }

    public function select($query, $params = []){
        /* Select query
            When using where, use ? for specific data
            Data must be passed through as second parameter
        */

        try{

            //start transaction so db session can be rolled back
            $this->dbh->beginTransaction();

            $stmt = $this->dbh->prepare($query);
            $stmt->execute($params);
            $data = $stmt->fetchAll();

            //commit changes from query
            $this->dbh->commit();

        }catch(Exception $e){

            $data = false;

            //roll data back when error occurs on transaction
            $this->dbh->rollBack();

        }

        return $data;

    }

    public function insert($query, $params = []){
        /* Insert query
            When using where, use ? for specific data
            Data must be passed through as second parameter
        */

        try{

            //start transaction so db session can be rolledback
            $this->dbh->beginTransaction();

            $stmt = $this->dbh->prepare($query);
            $data = $stmt->execute($params);

            //commit changes from query
            $this->dbh->commit();

        }catch(Exception $e){
            echo "Error - dumping Exception<br>";
            var_dump($e);
            $data = false;

            //roll data back when error occurs on transaction
            $this->dbh->rollBack();

        }

        return $data;

    }

    public function update($query, $params = []){
        /* Update query
            When using where, use ? for specific data
            Data must be passed through as second parameter
        */

        try{

            //start transaction so db session can be rolledback
            $this->dbh->beginTransaction();

            $stmt = $this->dbh->prepare($query);
            $data = $stmt->execute($params);

            //commit changes from query
            $this->dbh->commit();

        }catch(Exception $e){

            $data = false;

            //roll data back when error occurs on transaction
            $this->dbh->rollBack();

        }

        return $data;

    }

    public function delete($query, $params = []){
        /* Delete query
            When using where, use ? for specific data
            Data must be passed through as second parameter
        */

        try{

            //start transaction so db session can be rolledback
            $this->dbh->beginTransaction();

            $stmt = $this->dbh->prepare($query);
            $data = $stmt->execute($params);

            //commit changes from query
            $this->dbh->commit();

        }catch(Exception $e){

            $data = false;

            //roll data back when error occurs on transaction
            $this->dbh->rollBack();

        }

        return $data;

    }




}