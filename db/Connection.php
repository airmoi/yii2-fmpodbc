<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2014 Romain Dunand
 * @license  GPL
 */

namespace airmoi\yii2fmpodbc;

/**
 * @inherit
 */


class Connection extends \yii\db\Connection
{
     public $schemaMap = [
        'fmp' => 'airmoi\yii2fmpodbc\Schema', // FileMaker ODBC
       
    ];
     
     /**
     * Creates a command for execution.
     * @param string $sql the SQL statement to be executed
     * @param array $params the parameters to be bound to the SQL statement
     * @return Command the DB command
     */
    public function createCommand($sql = null, $params = [])
    {
        $command = new FmpCommand([
            'db' => $this,
            'sql' => $sql,
        ]);

        return $command->bindValues($params);
    }
}
