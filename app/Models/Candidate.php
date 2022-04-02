<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'full_name',
        'origin',
        'photo'
    ];

    protected $hidden = [
        'event_id',
        'created_at',
        'updated_at'
    ];


    /****************************************************************************************************
     * Candidate's Event
     *
     * @return BelongsTo
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }


    /****************************************************************************************************
     * Candidate's Ratings
     *
     * @return HasMany
     */
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
