<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
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
            'product_id' => 'required|exists:products,id',
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
                'product_id' => $request->product_id,
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

    public function adminProducts()
    {

        $products = Product::paginate(10);

        return view('admin.Products', compact('products'));
    }

    public function storeProduct(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'required|string',
            'product_price' => 'required|numeric',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $folder = 'product_images';
            $storagePath = storage_path('app/public/' . $folder);
            if (!file_exists($storagePath)) {
                mkdir($storagePath, 0777, true);
            }
            $path = $file->storeAs($folder, $filename, 'public');

            Product::create([
                'name' => $request->product_name,
                'description' => $request->product_description,
                'price' => $request->product_price,
                'image' => $filename,
            ]);

            return redirect()->route('admin.products')->with('success', 'Product added successfully!');
        } else {
            return redirect()->route('admin.products')->withErrors(['product_image' => 'No image was uploaded.'])->withInput();
        }
    }

    public function adminOrders()
    {
        $orders = Order::with('product')->paginate(10);
        return view('admin.Orders', compact('orders'));
    }

    public function destroyOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('admin.orders')->with('success', 'Order deleted successfully!');
    }

    public function updateOrder(Order $order)
    {
        
        // Logic to update the order
        $order->status = Request()->status; // Update status if provided, otherwise keep current status
        // Generate a unique alphanumeric code
        if(Request()->status == 'approved') {
            $order->code = $this->generateUniqueCode();
            $order->used = false; // Reset used status when order is approved
        }
        $order->save();
        return redirect()->route('admin.orders')->with('success', 'Order updated successfully!');
    }

    public function generateUniqueCode()
    {
        $code = substr(strtoupper(bin2hex(random_bytes(4))), 0, 8);
        while (Order::where('code', '=', $code)->exists()) {
            $code = substr(strtoupper(bin2hex(random_bytes(4))), 0, 8);
        }
        return $code;
    }

    public function getOrders($username)
    {
        $orders = Order::with('product')->where('username', $username)->get();
        
        return response()->json($orders);
    }
}
