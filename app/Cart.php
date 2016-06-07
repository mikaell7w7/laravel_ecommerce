<?php
/**
 * Created by PhpStorm.
 * User: mikaell
 * Date: 22/09/2015
 * Time: 09:21
 */

namespace CodeCommerce;


class Cart {

    private $items;

    public function __construct()
    {
        $this->items = [];
    }



    //add
    public function add($id, $name, $price)
    {
        // Os items serão agrupados pelo ID do produto
        $this->items += [
            $id =>[
                'qtd' => isset($this->items[$id]['qtd'])? $this->items[$id]['qtd']++:1, // se o item já existe e tem quantidade, ele recebe ++ , senão o valor é igual a 1
                'price' => $price,
                'name'  => $name
            ]
        ];

        return $this->items;
    }



    public function minus($id)
    {
        // Os items serão agrupados pelo ID do produto
        //SOLUÇÃO 01
        /*
        if (($this->items[$id]['qtd']) > 0 )
        {
            $this->items += [
                $id =>[
                    'qtd' => isset($this->items[$id]['qtd'])? $this->items[$id]['qtd']--:1, // se o item já existe e tem quantidade, ele recebe ++ , senão o valor é igual a 1
                    'price' => $price,
                    'name'  => $name
                ]
            ];
        return $this->items;
        }
        */
        /*
         * SOLUÇÃO 02
         */

        if ($this->items[$id]['qtd'] > 1) {
            $this->items[$id]['qtd']--;
        } else {
            unset($this->items[$id]);
        }
        return $this->items;


    }



    //remove
    public function remove($id)
    {
        unset($this->items[$id]);
    }



    //get all items
    public function all()
    {
        return $this->items;
    }



    //getTotal
    public function getTotal()
    {
        $total = 0;

        foreach($this->items as $items) {
            $total += $items['qtd'] * $items['price'];
        }

        return $total;
    }

}