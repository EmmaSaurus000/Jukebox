<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public $timestamps = TRUE;
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'parent',
        'icon',
    ];

    // BELOW Producing unknown column error. Unneeded columns, surely     //query
       // 'created_at' => self::CREATED_AT,
       // 'updated_at' => self::UPDATED_AT,
   // ];

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    // Ady's code no work here self-ref
    //function parent(){
        //return $this->belongsTo(Genre::class, 'id');
    //}

    public function getParent($id){
        //return $this->belongsTo(Genre::class, 'parent');
        $parent_name = Genre::find($id)->name;
        return $parent_name;
    }

    // public function parent($id){
        //return $this->belongsTo(Genre::class, 'parent');
        // $parent_name = Genre::find($id)->name;
        // return $parent_name;
    // }
}
