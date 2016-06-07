<?php namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    //Mass Assignment - para tratrar execptions de atribuições/injeções/valores ao mesmo tempo no Model

    protected $fillable = [
        'name',
        'description'
    ];

    public function products()
    {
        return $this->hasMany('CodeCommerce\Product'); // Uma categoria tem muitos produtos
    }

}
