<?php

namespace App\Service\Product;

use App\Entity\Product;
use App\Request\Product\ProductRequest;
use Doctrine\ORM\EntityManagerInterface;

class ProductService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }
    public function createProduct(ProductRequest $request): Product
    {
        $product = new Product();
        $product->setName($request->getName());
        $product->setPrice($request->getPrice());
        $this->entityManager->persist($product);

        return $product;
    }

    public function editProduct(Product $product, ProductRequest $request): Product
    {
        $product->setName($request->getName());
        $product->setPrice($request->getPrice());

        return $product;
    }
}