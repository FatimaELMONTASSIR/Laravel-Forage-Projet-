<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'phase',
        'status',
        'project_id',
        'due_date',
        'cost'
    ];

    protected $casts = [
        'due_date' => 'date',
        'cost' => 'decimal:2'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'pending' => 'gray',
            'in_progress' => 'yellow',
            'completed' => 'green',
            default => 'gray'
        };
    }

    public function getPhaseIconAttribute()
    {
        return match($this->phase) {
            'study' => 'fas fa-search',
            'drilling' => 'fas fa-drill',
            'installation' => 'fas fa-tools',
            'finishing' => 'fas fa-check-double',
            default => 'fas fa-tasks'
        };
    }
}
