<?php

namespace App\Helpers;

use AliseeksApi\Model\DoubleRange;
use AliseeksApi\Model\IntegerRange;
use Psr\Http\Message\ServerRequestInterface;

class RefactorBody
{
    protected $request;

    public function __construct(ServerRequestInterface $request)
    {
        $this->request = $request;
    }

    public function refactor()
    {
        $body = $this->request->getParsedBody();

        $priceFrom = get('price_from');
        $priceTo = get('price_to');
        $priceRange = new DoubleRange(['from' => $priceFrom,'to' => $priceTo]);

        $ratingsFrom = get('ratings_from');
        $ratingsRange = new IntegerRange(['from' => $ratingsFrom]);

        $orderFrom = get('orders_from');
        $orderRange = new IntegerRange(['from' => $orderFrom]);

        
        $body['price_range'] = $priceRange;
        $body['ratings_range'] = $ratingsRange;
        $body['order_range'] = $orderRange;
        return $body;
    }
}