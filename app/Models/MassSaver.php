<?php

namespace App\Models;
class MassSaver  
{
    public function save($object, $model){
        // check of object data type is object or array
        if (gettype($object)=="object")
           $object->save(); // Save the object of the model
        else  {
            // Mass assign and save object
            $model->fill($object);
           $object = $model->save();
        }
       return $object;
    }

}