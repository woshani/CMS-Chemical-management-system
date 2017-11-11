<?php
class ProductsController extends ApiController
{
    private $products = [];

    public function __construct()
    {
        $this->products[] = (object)['id' => 1, 'name' => 'Pizza', 'price' => 3.85];
        $this->products[] = (object)['id' => 2, 'name' => 'Pencil', 'price' => 0.49];
        $this->products[] = (object)['id' => 3, 'name' => 'Flashdrive', 'price' => 14.99];
    }

/** :GET */
    public function products()
    {
        return $this->products;
    }

/** :GET */
    public function product($id)
    {
        foreach ($this->products as $product) {
            if (strval($product->id) === $id) {
                return $product;
            }
        }

        return new HttpResponse(404, 'Not Found', (object)[
            'exception' => (object)[
                'type' => 'NotFoundApiException',
                'message' => 'Product not found',
                'code' => 404
            ]
        ]);
    }
}
