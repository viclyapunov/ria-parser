<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function __construct($description)
    {
    	$this->description = $description;
    }
}
