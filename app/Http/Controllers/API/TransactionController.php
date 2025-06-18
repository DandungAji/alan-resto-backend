<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'total_price' => 'required|integer|min:0',
            'amount_paid' => 'required|integer|min:0',
            'change' => 'required|integer|min:0',
            'items' => 'required|array',
            'items.*.product_id' => 'required|integer|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|integer|min:0'
        ]);

        try {
            $transaction = DB::transaction(function () use ($validated) {
                $newTransaction = Transaction::create([
                    'total_price' => $validated['total_price'],
                    'amount_paid' => $validated['amount_paid'],
                    'change' => $validated['change'],
                ]);

                foreach ($validated['items'] as $item) {
                    $newTransaction->details()->create([
                        'product_id' => $item['product_id'],
                        'quantity' => $item['quantity'],
                        'price' => $item['price'],
                    ]);
                }

                return $newTransaction;
            });

            return response()->json([
                'message' => 'Transaction created successfully',
                'data' => $transaction->load('details.product')
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create transaction',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
