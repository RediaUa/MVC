<?php
/**
 * Created by PhpStorm.
 * User: temka
 * Date: 25.09.17
 * Time: 22:46
 */

return array(
   /*запросу news соответсвует строка news/index*/ /*будет вызван метод actionIndex в контроллере NewsController */
    'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2',   //actionView(view one news) in NewsController mask1 = category, mask2= id
    'news' => 'news/index',         //actionIndex in NewsController
    'products' => 'product/list'    // actionList in ProductController
);