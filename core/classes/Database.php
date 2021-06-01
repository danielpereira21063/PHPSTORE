<?php
namespace core\classes;

use Exception;
use PDO;

class Database {
    private $conexao;

    //=======================================================================
    private function conn() {
        $this->conexao = new PDO(
            'mysql:'.
            'host='.MYSQL_SERVER.';'.
            'dbname='.MYSQL_DATABASE.';'.
            'charset='.MYSQL_CHARSET,
            MYSQL_USER,
            MYSQL_PASS,
            array(
                PDO::ATTR_PERSISTENT => true
            )
        );
        $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    //====================================================================

    private function close() {
        $this->conexao = null;
    }

    //=====================================================================
    public function select($sql, $paramns = null) {
        //verificar se foi passado um sql
        if(!preg_match("/^SELECT/i", $sql)) {
            throw new \Exception("{ $sql } não é uma instrução SELECT");
        }
        $this->conn();
        $result = null;
        try {
            if(!empty($paramns)) {
                $stmt = $this->conexao->prepare($sql);
                $stmt->execute($paramns);
                $result = $stmt->fetchAll(PDO::FETCH_CLASS);
            } else {
                $stmt = $this->conexao->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_CLASS);
            }           
        } catch (\PDOException $e) {
            return false;
        }
        $this->close();
        return $result;
    }

    public function insert($sql, $paramns = null) {
        //verificar se foi passado um sql
        if(!preg_match("/^INSERT/i", $sql)) {
            throw new \Exception("{ $sql } não é uma instrução INSERT");
        }
        $this->conn();
        try {
            if(!empty($paramns)) {
                $stmt = $this->conexao->prepare($sql);
                $stmt->execute($paramns);
            } else {
                $stmt = $this->conexao->prepare($sql);
                $stmt->execute();
            }           
        } catch (\PDOException $e) {
            return false;
        }
        $this->close();
    }


    public function update($sql, $paramns = null) {
        //verificar se foi passado um sql
        if(!preg_match("/^UPDATE/i", $sql)) {
            throw new \Exception("{ $sql } não é uma instrução UPDATE");
        }
        $this->conn();
        try {
            if(!empty($paramns)) {
                $stmt = $this->conexao->prepare($sql);
                $stmt->execute($paramns);
            } else {
                $stmt = $this->conexao->prepare($sql);
                $stmt->execute();
            }           
        } catch (\PDOException $e) {
            return false;
        }
        $this->close();
    }

    public function delete($sql, $paramns = null) {
        //verificar se foi passado um sql
        if(!preg_match("/^DELETE/i", $sql)) {
            throw new \Exception("{ $sql } não é uma instrução DELETE");
        }
        $this->conn();
        try {
            if(!empty($paramns)) {
                $stmt = $this->conexao->prepare($sql);
                $stmt->execute($paramns);
            } else {
                $stmt = $this->conexao->prepare($sql);
                $stmt->execute();
            }           
        } catch (\PDOException $e) {
            return false;
        }
        $this->close();
    }
    
    public function statement($sql, $paramns = null) {
        
        if(preg_match("/^(SELECT|UPDATE|INSERT|DELETE)/i", $sql)) {
            throw new \Exception("{ $sql } não é uma instrução válida");
        }
        $this->conn();
        try {
            if(!empty($paramns)) {
                $stmt = $this->conexao->prepare($sql);
                $stmt->execute($paramns);
            } else {
                $stmt = $this->conexao->prepare($sql);
                $stmt->execute();
            }           
        } catch (\PDOException $e) {
            return false;
        }
        $this->close();
    } 
}
