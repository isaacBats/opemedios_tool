<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsletterConfig extends Model
{
    protected $fillable = ['emails', 'banner'];
}
