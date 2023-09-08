<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Xendit\Xendit;

class PembayaranController extends Controller
{
    private $xenditApiKey;

    public function __construct()
    {
        $this->xenditApiKey = 'xnd_development_Moq6CWAHyizqbH5gy0Eath95qqiihbVwAb7iaYhfDuaaSPejy1VfmwoDlBmRWK';
        Xendit::setApiKey($this->xenditApiKey);
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
            'payer_email' => $request->input('payer_email'),
            'description' => $request->input('description'),
            'amount' => $request->input('amount'),
            'redirect_url' => 'https://faerul.com',
        ];

        try {
            $createInvoice = \Xendit\Invoice::create($params);
        } catch (\Xendit\Exceptions\ApiException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        $pembayaran = new Pembayaran;
        $pembayaran->external_id = $params['external_id'];
        $pembayaran->payer_email = $params['payer_email'];
        $pembayaran->description = $params['description'];
        $pembayaran->amount = $params['amount'];
        $pembayaran->status = 'pending';
        $pembayaran->checkout_link = $createInvoice['invoice_url'];
        $pembayaran->save();

        return redirect()->route('pembayaran.index');
    }
    public function webhook (Request $request){

        $getInvoice = \Xendit\Invoice::retrieve($request->id);

        // Get data

        $payment = Payment::where('external_id', $request->external_id)->firstOrFaild();

        if ($payment->status == 'settled'){

        return response()->json(['data' => 'Payment has been already processed']);

        }

        // Update status payment

        $payment->status = strtolower($getInvoice['status']);

        $payment->save();

        return response()->json(['data' => 'Payment has been already processed']);

        }


}
