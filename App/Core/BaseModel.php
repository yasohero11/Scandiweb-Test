<?php


namespace App\Core;

use database\DBConnection;

class BaseModel {
    protected static $table;
    protected static $whereClause = '';
    protected static $bindings = [];

    protected static function getConnection() {
        return DBConnection::getInstance();
    }

    public static function insert($data) {
        $keys = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), "?"));

        $sql = "INSERT INTO " . static::$table . " ({$keys}) VALUES ({$placeholders})";
        $stmt = self::getConnection()->prepare($sql);

        return $stmt->execute(array_values($data));
    }

    public static function where($column, $operator, $value) {
        if (static::$whereClause === '') {
            static::$whereClause = "WHERE {$column} {$operator} ?";
        } else {
            static::$whereClause .= " AND {$column} {$operator} ?";
        }

        static::$bindings[] = $value;


    }

    public static function select($fields = '*') {
        $sql = "SELECT {$fields} FROM " . static::$table . " " . static::$whereClause;

        $stmt = self::getConnection()->prepare($sql);
        $stmt->execute(static::$bindings);

        self::resetQuery();

        return $stmt->fetchAll(\PDO::FETCH_CLASS);
    }

    public static function update($data) {
        $setClause = implode(", ", array_map(function($key) {
            return "{$key} = ?";
        }, array_keys($data)));

        $sql = "UPDATE " . static::$table . " SET {$setClause} " . static::$whereClause;

        $stmt = self::getConnection()->prepare($sql);
        $result = $stmt->execute(array_merge(array_values($data), static::$bindings));

        self::resetQuery();

        return $result;
    }

    private static function prepare($sql){
        foreach (static::$bindings as $value) {
            // Safely escape the value and replace the first occurrence of ?
            //$escapedValue = self::getConnection()->quote($value);

            $sql = preg_replace('/\?/', $value, $sql, 1);
        }
        return $sql;
    }
    public static function delete() {


        $sql = self::prepare("DELETE FROM " . static::$table . " " . static::$whereClause);




        $stmt = self::getConnection()->prepare($sql);


        $result = $stmt->execute();

        self::resetQuery();

        return $result;
    }

    protected static function resetQuery() {
        static::$whereClause = '';
        static::$bindings = [];
    }
}
