<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Xendit\Xendit;

class PembayaranController extends Controller
{
    public function __construct()
    {
        Xendit::setApiKey('xnd_development_Moq6CWAHyizqbH5gy0Eath95qqiihbVwAb7iaYhfDuaaSPejy1VfmwoDlBmRWK');
    }

    public function index()
    {
        // Retrieve all pembayaran
        $pembayaran = Pembayaran::all();

        // Return the view with the list of pembayaran
        return view('pembayaran.index', compact('pembayaran'));
    }

    public function create()
    {
        return view('pembayaran.create');
    }

    public function store(Request $request)
    {
        // Validate the input data
        $validator = Validator::make($request->all(), [
            'payer_email' => 'required|email',
            'description' => 'required',
            'amount' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $params = [
            'external_id' => (string) Str::uuid(),
            'payer_email' => $request->payer_email,
            'description' => $request->description,
            'amount' => $request->amount,
            'redirect_url' => 'https://faerul.com',
        ];

        try {
            $createInvoice = \Xendit\Invoice::create($params);
        } catch (\Xendit\Exceptions\ApiException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        $pembayaran = new Pembayaran;
        $pembayaran->external_id = $params["external_id"];
        $pembayaran->payer_email = $params["payer_email"];
        $pembayaran->description = $params["description"];
        $pembayaran->amount = $params["amount"];
        $pembayaran->status = 'pending';
        $pembayaran->checkout_link = $createInvoice['invoice_url'];
        $pembayaran->save();

        // return response()->json(['message' => 'Payment created successfully'], 201);
        return redirect()->route('pembayaran.index');

    }

    // public function webhook(Request $request)
    // {
    //     // Retrieve the invoice information from Xendit based on the provided ID
    //     $invoiceId = $request->id;
    //     $externalId = $request->external_id;

    //     try {
    //         $getInvoice = \Xendit\Invoice::retrieve($invoiceId);
    //     } catch (\Xendit\Exceptions\ApiException $e) {
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }

    //     // Find the corresponding payment record in your database using external_id
    //     $pembayaran = Pembayaran::where('external_id', $externalId)->first();

    //     if (!$pembayaran) {
    //         return response()->json(['error' => 'Payment record not found'], 404);
    //     }

    //     // Update the payment status in your database with the Xendit invoice status
    //     $newStatus = strtolower($getInvoice['status']);
    //     $pembayaran->status = $newStatus;
    //     $pembayaran->save();

    //     return response()->json(['message' => 'Payment status updated successfully']);
    // }
}
