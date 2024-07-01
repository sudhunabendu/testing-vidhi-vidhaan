<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function gemstones(){
        return $this->hasMany(Gemstone::class);
    }


    public static function shiftChild($cat_id){
        return Category::where('parent_id',$cat_id)->update(['parent_id'=>1]);
    }


    public static function getChildByParentID($id){
        return Category::where('parent_id',$id)->pluck('category','id');
    }



    public function subcategory()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
