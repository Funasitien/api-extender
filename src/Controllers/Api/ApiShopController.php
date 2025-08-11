<?php

namespace Azuriom\Plugin\ApiExtender\Controllers\Api;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Plugin\ApiExtender\Middleware\VerifyApiKey;
use Illuminate\Http\Request;
use Azuriom\Plugin\Shop\Models\Category;
use Azuriom\Plugin\Shop\Models\Payment;

class ApiShopController extends Controller
{
    public function __construct()
    {
        $this->middleware(VerifyApiKey::class);
    }

    public function payments(Request $request)
    {
        $perPage = (int) $request->input('per_page', 50);
        $perPage = max(1, min($perPage, 100));

        $payments = Payment::query()
            ->with([
                'user:id,name',
                'items' => function ($q) {
                    $q->select([
                        'id', 'payment_id', 'name', 'price', 'quantity', 'buyable_type', 'buyable_id', 'expires_at', 'created_at',
                    ]);
                },
            ])
            ->latest('created_at')
            ->paginate($perPage, [
                'id', 'user_id', 'price', 'currency', 'status', 'gateway_type', 'transaction_id', 'created_at',
            ]);

        $payments->getCollection()->each(function ($payment) {
            $payment->items->each(function ($item) {
                $item->unsetRelation('payment');
            });
        });

        return response()->json($payments);
    }


    public function categories()
    {
        $categories = Category::query()
            ->enabled()
            ->parents()
            ->with([
                'categories' => fn ($q) => $q->enabled(),
                'packages' => fn ($q) => $q->enabled()->select([
                    'id', 'category_id', 'name', 'short_description', 'price', 'billing_type', 'is_enabled', 'position',
                ]),
            ])
            ->get([
                'id', 'name', 'slug', 'description', 'icon', 'position', 'parent_id', 'is_enabled',
            ]);

        return response()->json([
            'categories' => $categories,
        ]);
    }
}



