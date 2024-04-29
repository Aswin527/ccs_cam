<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\Slug;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductsImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $packing="";
            $composition="";
        if(!empty($row[3]))
        {
           $packing  =$row[3];
        }
        if(!empty($row[2]))
        {
           $composition  =$row[2];
        }
        $product=Product::create([
            'name' => $row[1],
            //'image' => "Products/".strtolower(str_replace(" ","-",$row[1])).".jpg",
           'image'=>'',
            'description' =>"",
            'packing' => $packing,
            'price' => "",
            'composition' => $composition,
            'slug' => strtolower($this->cleanStr($row[1])),
            'meta_title' => $row[1],
            'meta_keyword' => $row[1],
            'meta_description' => $row[1],
        ]);
            Slug::create([
                'slug' => strtolower($this->cleanStr($row[1])),
                'type' => 1,
                'slugid' => $product->id
            ]);
            foreach(explode(",",$row[0]) as $item){
                $item=ltrim($item);
                $item=rtrim($item);
                $category=Category::where('name',$item)
                    ->first();
                //dd($category->id);
                if($category == NULL){
                    $category=Category::create([
                        'name' => $item,
                        'type' => 1,
                        'meta_title' =>$item,
                        'meta_keyword' =>$item,
                        'meta_description' =>$item,
                        'slug' => strtolower($this->cleanStr($item))
                    ]);
                    Slug::create([
                        'slug' => strtolower($this->cleanStr($item)),
                        'type' => 4,
                        'slugid' => $category->id
                    ]);   
                }
                CategoryProduct::create([
                    'product_id' => $product->id,
                    'category_id' => $category->id
                ]);
            }
        }
    }
  
  public function cleanStr($string){
    // Replaces all spaces with hyphens.
    $string = str_replace(' ', '-', $string);

    // Removes special chars.
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
    // Replaces multiple hyphens with single one.
    $string = preg_replace('/-+/', '-', $string);
    
    return $string;
}


}
