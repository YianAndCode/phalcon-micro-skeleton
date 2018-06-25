<?php
namespace Models;

use Phalcon\Mvc\Model;

class ModelBase extends Model
{
    public function initialize()
    {
    }
    
    public function beforeCreate()
    {
        $this->created_at = date("Y-m-d H:i:s");
    }

    public function beforeUpdate()
    {
        $this->updated_at = date("Y-m-d H:i:s");
    }
    
    public function beforeValidationOnCreate()
    {
        $this->created_at = date("Y-m-d H:i:s");
        $this->updated_at = date("Y-m-d H:i:s");
    }

    public function beforeValidationOnUpdate()
    {
        $this->updated_at = date("Y-m-d H:i:s");
    }
}