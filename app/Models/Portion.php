<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Portion extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'title',
        'description'
    ];

    protected $hidden = [
        'event_id',
        'created_at',
        'updated_at'
    ];


    /****************************************************************************************************
     * Portion's Event
     *
     * @return BelongsTo
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }


    /****************************************************************************************************
     * Portions's Criteria
     *
     * @return HasMany
     */
    public function criteria()
    {
        return $this->hasMany(Criterion::class);
    }
}
