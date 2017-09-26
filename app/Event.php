<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Event
 *
 * @package App
 * @property string $name
 * @property string $event_date
*/
class Event extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'event_date'];
    

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setEventDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['event_date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['event_date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getEventDateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }

    public function getSentAttribute()
    {
        return $this->invitations()->whereNotNull('sent_at')->count();
    }

    public function getAcceptedAttribute()
    {
        return $this->invitations()->whereNotNull('accepted_at')->count();
    }

    public function getRejectedAttribute()
    {
        return $this->invitations()->whereNotNull('rejected_at')->count();
    }

}
