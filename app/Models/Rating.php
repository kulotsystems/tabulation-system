<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'judge_id',
        'candidate_id',
        'criterion_id',
        'rating',
    ];

    protected $hidden = [
        'judge_id',
        'candidate_id',
        'criterion_id',
        'created_at',
        'updated_at'
    ];


    /****************************************************************************************************
     * Rating's Judge
     *
     * @return BelongsTo
     */
    public function judge()
    {
        return $this->belongsTo(Judge::class);
    }


    /****************************************************************************************************
     * Rating's Candidate
     *
     * @return BelongsTo
     */
    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }


    /****************************************************************************************************
     * Rating's Criterion
     *
     * @return BelongsTo
     */
    public function criterion()
    {
        return $this->belongsTo(Criterion::class);
    }
}
