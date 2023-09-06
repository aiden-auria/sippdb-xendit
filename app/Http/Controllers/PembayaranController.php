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
        $pembayaran = Pembayaran::all();
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
            return redirect()->route('pembayaran.create')
                ->withErrors($validator)
                ->withInput();
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
            return redirect()->route('pembayaran.create')
                ->with('error', $e->getMessage());
        }

        $pembayaran = new Pembayaran;
        $pembayaran->external_id = $params["external_id"];
        $pembayaran->payer_email = $params["payer_email"];
        $pembayaran->description = $params["description"];
        $pembayaran->amount = $params["amount"];
        $pembayaran->status = 'pending';
        $pembayaran->checkout_link = $createInvoice['invoice_url'];
        $pembayaran->save();

        return redirect()->route('pembayaran.index')
            ->with('success', 'Payment created successfully');
    }

    public function show(Pembayaran $pembayaran)
    {
        return view('pembayaran.show', compact('pembayaran'));
    }

    public function edit(Pembayaran $pembayaran)
    {
        return view('pembayaran.edit', compact('pembayaran'));
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        // Validation and update logic similar to the store method
    }

    public function destroy(Pembayaran $pembayaran)
    {
        // Delete logic here
    }

    public function webhook(Request $request)
    {
        // Retrieve the invoice information from Xendit based on the provided ID
        $getInvoice = \Xendit\Invoice::retrieve($request->id);

        // Find the corresponding payment record in your database using external_id
        $pembayaran = Pembayaran::where('external_id', $request->external_id)->firstOrFail();

        // Check if the payment has already been settled
        if ($pembayaran->status == 'settled') {
            return response()->json([
                'data' => ['telah di bayar']
            ]);
        }

        // Update the payment status in your database with the Xendit invoice status
        $pembayaran->status = strtolower($getInvoice['status']);
        $pembayaran->save();

        return response()->json([
            'data' => ['berhasil']
        ]);
    }
}
