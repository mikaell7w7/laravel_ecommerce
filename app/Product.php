<?php namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model {

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'featured',
        'recommend'
    ];

    public function images()
    {
        return $this->hasMany('CodeCommerce\ProductImage'); // Possui muitas imagens
    }

    public function category()
    {
        return $this->belongsTo('CodeCommerce\Category'); // Um produto, pertence a uma categoria
    }

    public function tags()
    {
        return $this->belongsToMany('CodeCommerce\Tag');
    }

    public function getNameDescriptionAttribute() // Lists Mutators
    {
        return $this->name. " - ".$this->description;
    }

    public function getTagListAttribute()
    {
        $tags = $this->tags->lists('name')->toArray();

        return implode(',', $tags);
    }

    public function scopeFeatured($query)
    {
         return $query->where('featured','=','1')->orderBy(DB::raw('RANDOM()'))->limit(3);
    }

    public function scopeRecommended($query)
    {
        return $query->where('recommend','=','1')->orderBy(DB::raw('RANDOM()'))->limit(3);
    }

    public function scopeOfCategory($query,$type)
    {
        return $query->where('category_id','=',$type);
    }



}
