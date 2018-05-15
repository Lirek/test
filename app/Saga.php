<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Saga extends Model
{
    use Notifiable;

    protected $table = 'saga';

    protected $fillable = [
        'id', 'seller_id', 'rating_id',
        'sag_name', 'sag_description',
        'img_saga', 'status', 'type_saga',
    ];

    public function book()
    {
        return $this->hasOne('App\Book');
    }
}
