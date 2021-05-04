<?php

/*
 * migbertyanez@disroot.org
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['title','content'];
}