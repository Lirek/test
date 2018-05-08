<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Saga extends Model
{
    use Notifiable;

    protected $table = 'saga';

    protected $fillable = [
        'sag_name', 'sag_description',
        'status', 'type_saga', 'id'
    ];

    public function book()
    {
        return $this->hasOne('App\Book');
    }
}
