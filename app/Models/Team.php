<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'leader',
        'members_count',
        'specialization',
        'status'
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'active' => 'green',
            'busy' => 'yellow',
            'inactive' => 'gray',
            default => 'gray'
        };
    }

    public function getActiveProjectsCountAttribute()
    {
        return $this->projects()->whereIn('status', ['planning', 'in_progress'])->count();
    }
}
