<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];


    /****************************************************************************************************
     * Event's Judges
     *
     * @return HasMany
     */
    public function judges()
    {
        return $this->hasMany(Judge::class);
    }


    /****************************************************************************************************
     * Event's Candidates
     *
     * @return HasMany
     */
    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }


    /****************************************************************************************************
     * Event's Portions
     *
     * @return HasMany
     */
    public function portions()
    {
        return $this->hasMany(Portion::class);
    }
}
