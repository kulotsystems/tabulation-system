<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Judge extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'full_name',
        'is_chairman',
        'photo',
        'username',
        'password'
    ];

    protected $hidden = [
        'event_id',
        'created_at',
        'updated_at'
    ];


    /****************************************************************************************************
     * Judge's Event
     *
     * @return BelongsTo
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }


    /****************************************************************************************************
     * Judge's Ratings
     *
     * @return HasMany
     */
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
