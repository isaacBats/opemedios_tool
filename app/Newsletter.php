<?php

namespace App;

use App\NewsletterData;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    
    protected $fillable = ['status'];

    public function sections () {
        
        return $this->hasMany(NewsletterData::class);
    }
}
