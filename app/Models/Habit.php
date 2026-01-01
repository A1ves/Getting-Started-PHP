<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Habit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',

    ];

    // UM HABITO PERTENCE A UM USUARIO

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // UM HABITO PODE TER MUITOS REGISTROS DE HABITOS
    public function habitLogs(): HasMany
    {
        return $this->hasMany(HabitLog::class);
    }

    public function wasCompletedToday(): bool
    {
        return $this->habitLogs
            ->where('completed_at', Carbon::today()->toDateString())
            ->isNotEmpty();
    }

//    public function wasCompletedToday(): bool
//    {
//        return $this->habitLogs()
//            ->where('completed_at', Carbon::today()->toDateString())
//            ->exists();
//    }
}
