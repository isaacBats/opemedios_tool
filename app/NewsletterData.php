<?php

namespace App;

use App\Newsletter;
use Illuminate\Database\Eloquent\Model;

class NewsletterData extends Model
{
    
    protected $table = 'newsletter_data';

    protected $fillable = ['newsletter_id', 'link', 'label'];

    public function newsletter () {

        return $this->belongsTo(Newsletter::class);
    }
}
