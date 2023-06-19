<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        // proses validasi
        $validate = Validator::make($request->all(), [
            'name' => 'required|min:4',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'category_id' => 'required|integer',
        ]);

        if ($validate->fails()) {
            return $validate->errors();
        }

        // proses simpan data
        $data = Product::create($request->all());
        return response()->json([
            'pesan' => 'Data berhasil disimpan',
            'data' => $data
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $data = Product::where('id', $id)->first();

        // cek data dengan id yg dikirimkan
        if (empty($data)) {
            return response()->json([
                'pesan' => 'Data tidak ditemukan',
                'data' => $data
            ], 404);
        }

        // proses validasi
        $validate = Validator::make($request->all(), [
            'name' => 'required|min:4',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'category_id' => 'required|integer',
        ]);

        if ($validate->fails()) {
            return $validate->errors();
        }

        // proses simpan perubahan data
        $data->update($request->all());

        return response()->json([
            'pesan' => 'Data berhasil di update',
            'data' => $data
        ], 201);
    }
    public function destroy($id)
    {
        $data = Product::where('id', $id)->first();
        // cek data dengan id yg dikirimkan
        if (empty($data)) {
            return response()->json([
                'pesan' => 'Data tidak ditemukan',
                'data' => $data
            ], 404);
        }

        $data->delete();

        return response()->json([
            'pesan' => 'Data berhasil di hapus',
            'data' => $data
        ], 200);
    }
}
