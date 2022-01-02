<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $fillable = [
        'id',
        'todo_txt',
        'action_status',
        'created_dtm',
        'last_update_dtm',
        'delete_dtm'
    ];
}
