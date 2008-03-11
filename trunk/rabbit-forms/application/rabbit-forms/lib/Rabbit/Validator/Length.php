<?php

/**
 * Rabbit Forms
 * 
 * Copyright (c) 2008 Wilker Lúcio
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *     http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * 
 * @author   Wilker Lúcio da Silva
 * @version  $Id$
 * @license  Apache License 2.0 http://www.apache.org/licenses/LICENSE-2.0
 */

class Rabbit_Validator_Length extends Rabbit_Validator
{
    /**
     * @see Rabbit_Validator::validate()
     *
     * @return boolean
     */
    public function validate()
    {
        $value  = $this->field->getRawValue();
        $length = strlen($value);
        
        $exact = $this->getParam('exact');
        $min   = $this->getParam('min');
        $max   = $this->getParam('max');
        
        if($exact !== null && $length != $exact) {
            $this->message = sprintf(
                'The %s field must be exactly %s characters in length.',
                $this->field->getLabel(),
                $exact
            );
            
            return false;
        } elseif($min !== null && $length < $min) {
            $this->message = sprintf(
                'The %s field must be at least %s characters in length.',
                $this->field->getLabel(),
                $min
            );
            
            return false;
        } elseif($max !== null && $length > $max) {
            $this->message = sprintf(
                'The %s field can not exceed %s characters in length.',
                $this->field->getLabel(),
                $max
            );
            
            return false;
        }
        
        return true;
    }
}