<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Invitation
 *
 * @package App
 * @property string $event
 * @property string $email
 * @property string $sent_at
 * @property string $accepted_at
 * @property string $rejected_at
*/
class Invitation extends Model
{
    use SoftDeletes;

    protected $fillable = ['email', 'sent_at', 'accepted_at', 'rejected_at', 'event_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setEventIdAttribute($input)
    {
        $this->attributes['event_id'] = $input ? $input : null;
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id')->withTrashed();
    }
    
}
