<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        'deadline',
        'budget',
        'actual_cost',
        'team_id',
        'user_id',
        'phases'
    ];

    protected $casts = [
        'deadline' => 'date',
        'phases' => 'array',
        'budget' => 'decimal:2',
        'actual_cost' => 'decimal:2'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'planning' => 'blue',
            'in_progress' => 'yellow',
            'completed' => 'green',
            'delayed' => 'red',
            default => 'gray'
        };
    }

    public function getProgressPercentageAttribute()
    {
        $totalTasks = $this->tasks()->count();
        if ($totalTasks === 0) return 0;
        
        $completedTasks = $this->tasks()->where('status', 'completed')->count();
        return round(($completedTasks / $totalTasks) * 100);
    }
}
