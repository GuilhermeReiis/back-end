<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Product;

class ImportProducts extends Command
{
    protected $signature = 'products:import {--id=}';
    protected $description = 'Import products from Fake Store API';

    protected string $apiUrl = 'https://fakestoreapi.com/products';

    private function saveProduct(array $productData): bool
    {
        try {
            Product::updateOrCreate(
                ['name' => $productData['title']],
                [
                    'name' => $productData['title'],
                    'price' => $productData['price'],
                    'description' => $productData['description'],
                    'category' => $productData['category'],
                    'image_url' => $productData['image'] ?? null,
                ]
            );
            return true;
        } catch (\Exception $e) {
            $this->error("Failed to save product '{$productData['title']}'");
            return false;
        }
    }

    public function handle(): int
    {
        $id = $this->option('id');
        if($id){
            $this->info("Importing product $id...");
            $response = Http::get("{$this->apiUrl}/{$id}");

            if($response->failed()){
                $this->error("Error searching for product with id {$id}");
                return 1;
            }

            $product = $response->json();
            $this->saveProduct($product);
            $this->info("Product imported successfully!");
        }else{
            $this->info("Importing all products...");
            $response = Http::get("{$this->apiUrl}");

            if($response->failed()){
                $this->error("Error fetching products");
                return 1;
            }

            $products = $response->json();
            foreach ($products as $product) {
                $this->saveProduct($product);
            }
        }

        $this->info("Finished!");
        return 0;
    }
}
