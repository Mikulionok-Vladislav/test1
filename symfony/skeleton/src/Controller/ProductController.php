<?php

namespace App\Controller;

use App\Entity\Product;
use App\Request\Product\ProductRequest;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\Product\ProductService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{

    public function __construct(private EntityManagerInterface $entityManager, private ProductService $productService)
    {
    }

    #[Route('/product', name: 'product_list', methods: ['GET'])]
    public function productList(): JsonResponse
    {
        $products = $this->entityManager->getRepository(Product::class)->findAll();

        return $this->json($products);
    }

    #[Route('/product/{id}', name: 'show_product', methods: ['GET'])]
    public function getProduct(Product $product): JsonResponse
    {
        return $this->json($product);
    }

    #[Route('/product', name: 'create_product', methods: ['POST'])]
    public function create(ProductRequest $request): JsonResponse
    {
        $product = $this->productService->createProduct($request);
        $this->entityManager->flush();

        return $this->json($product, Response::HTTP_CREATED);
    }

    #[Route('/product/{id}', name: 'product_delete', methods: ['DELETE'])]
    public function delete(Product $product): Response
    {
        $this->entityManager->remove($product);
        $this->entityManager->flush();

        return $this->json([], JsonResponse::HTTP_NO_CONTENT);
    }

    #[Route('/product/{id}', name: 'product_edit', methods: ['PUT'])]
    public function edit(ProductRequest $request, Product $product): JsonResponse
    {
        $product = $this->productService->editProduct($product, $request);
        $this->entityManager->flush();

        return $this->json($product, JsonResponse::HTTP_ACCEPTED);
    }
}

