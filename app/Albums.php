namespace App;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
   
   protected $table = 'album';

   protected $fillable = [
             'id',
      'seller_id',
      'autors_id', 
      'name_alb',
      'cover',
      'producer',
      'duration',
      'cost',
      'rating_id',
      'publish_date',
      'status'
    ];

    public function tags_music()
    {
      return $this->belongsToMany('App\Tags','music_tags','music_id','tags_id');
    }

      public function songs()
    {
      return $this->hasMany('App\Songs','album');
    }

    public function Autors()
    {
      return $this->belongsTo('App\music_authors', 'autors_id');
    }

    public function Seller()
    {
      return $this->belongsTo('App\Seller', 'seller_id');
    }

    public function Rating()
    {
      return $this->belongsTo('App\Rating', 'rating_id');
    }

    public function Transactions()
    {
      return $this->hasMany('App\Transactions','album_id'); 
    }
}
