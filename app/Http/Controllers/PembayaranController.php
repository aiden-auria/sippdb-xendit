<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Xendit\Xendit;

class PembayaranController extends Controller
{
    public function __construct()
    {
        Xendit::setApiKey('xnd_development_Moq6CWAHyizqbH5gy0Eath95qqiihbVwAb7iaYhfDuaaSPejy1VfmwoDlBmRWK');
    }

    public function create(Request $request)
    {
        $params = [
            'external_id' => (string) Str::uuid(),
            'payer_email' => $request->payer_email,
            'description' => $request->description,
            'amount' => $request->amount,
            'redirect_url' => 'https://faerul.com', // Corrected the single quotes and added 'https://' to the URL
        ];

        $createInvoice = \Xendit\Invoice::create($params); // Fixed the variable assignment
        $pembayaran = new Pembayaran;
        $pembayaran->status = 'pending';
        $pembayaran->checkout_link = $createInvoice['invoice_url'];
        $pembayaran->external_id = $params["external_id"];
        $pembayaran->save();

        return response()->json([
            'data' => $createInvoice['invoice_url']
        ]);



        // You might want to handle the response from the Xendit API here, for example:
    }
    public function webhook(Request $request)
    {
        $getInvoice = \Xendit\Invoice::retrieve($request->id);

        $pembayaran = Pembayaran::where('external_id', $request->external_id)->firstOrFail();
        if ($pembayaran->status == 'settled') {
            return response()->json([
                'data' => ['telah di bayar']
            ]);

        }
        $pembayaran->status = strtolower($getInvoice['status']);
        $pembayaran->save();

        return response()->json([
            'data' => ['berhasil']
        ]);


    }
}
