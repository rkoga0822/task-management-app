<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
        'status',
        'user_id',
        'due_date'
    ];

        public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //accessor
    public function getStatusLabelAttribute()
    {
        return [
            'todo' => '未完了',
            'doing' => '進行中',
            'done' => '完了',
        ][$this->status] ?? '不明';
    }
}
