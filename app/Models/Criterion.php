<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Criterion extends Model
{
    use HasFactory;

    protected $table = 'criteria';

    protected $fillable = [
        'portion_id',
        'title',
        'percentage'
    ];

    protected $hidden = [
        'portion_id',
        'created_at',
        'updated_at'
    ];


    /****************************************************************************************************
     * Criterion's Portion
     *
     * @return BelongsTo
     */
    public function portion()
    {
        return $this->belongsTo(Portion::class);
    }


    /****************************************************************************************************
     * Criterion's Ratings
     *
     * @return HasMany
     */
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
