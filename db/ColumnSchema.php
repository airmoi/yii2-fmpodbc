<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace airmoi\yii2fmpodbc;
use yii;
use yii\base\Object;

/**
 * ColumnSchema class describes the metadata of a column in a database table.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ColumnSchema extends \yii\db\ColumnSchema
{
    /**
     * Converts the input value according to [[phpType]] after retrieval from the database.
     * If the value is null or an [[Expression]], it will not be converted.
     * @param mixed $value input value
     * @return mixed converted value
     */
    public function phpTypecast($value)
    {
        if ($value === '' && $this->type !== Schema::TYPE_TEXT && $this->type !== Schema::TYPE_STRING && $this->type !== Schema::TYPE_BINARY) {
            return null;
        }
        if ($value === null || gettype($value) === $this->phpType || $value instanceof Expression) {
            return $value;
        }
        switch ($this->phpType) {
            case 'resource':
            case 'string':
                return is_resource($value) ? $value : (string) $value;
            case 'integer':
                return (integer) $value;
            case 'boolean':
                return (boolean) $value;
            case 'double':
                return (double) $value;
            case 'date':
                return (string) $value;
                //$date = \DateTime::createFromFormat('Y-m-d', ($value));
                //return $date->format('d/m/Y');
            case 'timestamp':
                return (string) $value;
               // $date = \DateTime::createFromFormat('Y-m-d H:i:s', $value);
               //return $date->format('d/m/Y H:i:s');
        }

        return $value;
    }

    /**
     * Converts the input value according to [[type]] and [[dbType]] for use in a db query.
     * If the value is null or an [[Expression]], it will not be converted.
     * @param mixed $value input value
     * @return mixed converted value. This may also be an array containing the value as the first element
     * and the PDO type as the second element.
     */
    public function dbTypecast($value)
    {
       if( (  $value==='' || $value===null ) && $this->allowNull)
			return '';
       
		switch($this->dbType)
		{
			case 'varchar':
                            return "••varchar••".$value;
			case 'binary': return $value;
			case 'decimal': return "••decimal••".$value;
			//case 'time': return "{t $value}";
			//case 'date': return "{d $value}";
			///case 'timestamp': return "{ts $value}";
			default: return $value;
		}
    }
}
