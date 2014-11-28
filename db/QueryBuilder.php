<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2014 Romain Dunand
 * @license  GPL
 */

namespace airmoi\yii2fmpodbc;


//use yii\base\InvalidParamException;
//use yii\db\Connection;

/**
 * QueryBuilder is the query builder for FileMaker databases.
 *
 * @author Romain Dunand <airmoi@gmail.com>
 * @since 2.0
 */
class QueryBuilder extends \yii\db\QueryBuilder {
    
    /**
     * @param integer $limit
     * @param integer $offset
     * @return string the LIMIT and OFFSET clauses
     */
    public function buildLimit($limit, $offset)
    {
        $sql = '';
        if($offset>0)
            $sql.=' OFFSET '.(int)$offset . ' ROWS';

        if($limit>0)
            $sql.=' FETCH FIRST  '.(int)$limit . ' ROWS ONLY';

        return ltrim($sql);
    }
}
