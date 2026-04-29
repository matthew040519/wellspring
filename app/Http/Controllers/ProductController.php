<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    //
    public function buyProduct(Request $request)
    {
        // Validate username and file upload
        $validated = $request->validate([
            'username' => 'required|string',
            'file' => 'required|file',
        ]);

        $response = Http::get('https://www.phxview.com/api/user-details/'.$request->username);
        $data = $response->json();

        
        // If $data has an 'Error' key, return error
        if (isset($data['Error']) && $data['Error']) {
            return redirect()->route('index')->withErrors(['username' => $data['Error']])->withInput();
        }

        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $request->file('file')->getClientOriginalName();
            $folder = 'uploads';
            $storagePath = storage_path('app/public/' . $folder);
            if (!file_exists($storagePath)) {
                mkdir($storagePath, 0777, true);
            }
            $path = $file->storeAs($folder, $filename, 'public');

            Order::create([
                'username' => $request->username,
                'file' => $filename,
                'status' => 'pending',
            ]);
        } else {
            return redirect()->route('index')->withErrors(['file' => 'No file was uploaded.'])->withInput();
        }

        // Save the order to the database or any other logic
        return redirect()->route('index')->with('success', 'Product purchased and file uploaded successfully!');
        // $productId = $request->input('product_id');
        // // Logic to handle product purchase
        // return response()->json(['message' => 'Product purchased successfully', 'product_id' => $productId]);
    }
}
