<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\payment\TripayController;
use App\Http\Livewire\ProductDetail;
use App\Mail\VerifEmail;
use App\Models\HistoryPesanan;
use App\Models\Liga;
use App\Models\Pesanan;
use App\Models\PesananDetails;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Illuminate\Support\Str;

use function PHPUnit\Framework\isEmpty;

class ApiController extends Controller
{
    public function register(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.unique' => 'Email ini sudah di gunakan',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password setidaknya memiliki 8 karakter',
        ]);
        if ($validated->fails()) {
            return response()->json([
                'message' => 'Gagal Menambahkan Account !',
                'error' => $validated->errors()
            ], 400);
        }
        $random = Str::random(5);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verifikasiToken' => $random,
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'message' => 'Success menambahkan Account !',
            'token' => $token
        ]);
    }
    public function sendEmail()
    {
        $body = [
            'name' => 'Raga',
            'body' => 'Testing'
        ];
        Mail::to('putraraga959@gmail.com')->send(new VerifEmail($body));
        $random = Str::random(5);
        $user = User::where('id', 2)->first();
        $user->verifikasitoken = $random;
        $user->update();
        return response()->json([
            'message' => "pesan",
            'token' => $user
        ]);
    }
    public function verificationEmail(Request $request)
    {
        $user = User::where('id', 2)->first();
        $veriftoken = $user->verifikasitoken;
        if ($request->confirmVerif != $veriftoken) {
            return response()->json([
                'message' => 'token tidak match',
                'token' => $veriftoken
            ]);
        } else {
            return response()->json([
                'message' => 'token match'
            ]);
        }
    }
    public function login(Request $request)
    {
        $validated = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email harus di isi',
                'password.required' => 'Password harus di isi',
            ]
        );
        if ($validated->fails()) {
            return response()->json([
                'message' => 'Gagal Login',
                'error' => $validated->errors()
            ], 400);
        }
        $auth = Auth::attempt($request->only('email', 'password'));
        if (!$auth) {
            return response()->json([
                'message' => 'Email dan Password tidak cocok',
                'alert' => $auth
            ], 401);
        }
        $user = User::where('email', $request->email)->first();
        $token = $user->createToken('token-auth')->plainTextToken;
        return response()->json([
            'message' => 'Berhasil Login',
            'access_token' => $token,
            'User' => $user
        ]);
    }
    public function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();
        $token = $user->currentAccessToken();
        if (empty($token)) {
            return response()->json(
                [
                    'message' => 'Logout failed',
                    'access' => $token
                ]
            );
        } else {
            return response()->json([
                'status' => 'success',
                'message' => 'Logout successfully',
                'access' => $token
            ], 200);
        }
    }
    public function getProfile($id)
    {
        $profile = User::where('id', $id)->first();
        if ($profile == null) {
            return response()->json([
                'message' => 'Profile tidak ditemukan'
            ]);
        }
        return response()->json([
            'profile' => $profile
        ]);
    }
    public function updateProfile(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'alamat' => 'required',
                'nohp' => 'required',
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Gagal Mengubah data Profile',
                'error' => $validator->errors()
            ], 400);
        }
        $user = User::where('id', $request->id)->first();
        if (!empty($user)) {
            $image = $request->file('poto');
            //masukan ke dalma folder storage
            // $image->storeAs('postImg', $image->hashName());
            $image->move(public_path('assets/jersey'), $image->hashName());
            $user->name = $request->name;
            $user->alamat = $request->alamat;
            $user->nohp = $request->nohp;
            $user->poto = $image->hashName();
            $user->update();
            return response()->json([
                'message' => 'Berhasil Update Profile',
            ]);
        } else {
            return response()->json([
                'message' => 'Profile tidak ditemukan',
            ], 404);
        }
        // return response()->json([
        //     'message' => $user,
        // ]);
    }
    public function bestProduct()
    {
        return response()->json([
            'product' => Product::take(4)->get()
        ]);
    }
    public function getProduct()
    {
        return response()->json([
            'product' => Product::all()
        ]);
    }
    public function getProductByLiga($liga_id)
    {
        return response()->json([
            'product' => Product::where('liga_id', $liga_id)->get()
        ]);
    }
    public function searchProduct($nama_product)
    {
        $product = Product::where('nama', 'like', '%' . $nama_product . '%')->get();
        return response()->json([
            'product' => $product
        ]);
    }
    public function getLiga()
    {
        return response()->json([
            'liga' => Liga::all()
        ]);
    }
    public function getLigaById($liga_id)
    {
        return response()->json([
            'liga' => Liga::where('id', $liga_id)->get()
        ]);
    }
    public function searchLiga($nama_liga)
    {
        return response()->json([
            'liga' => Liga::where('nama', 'like', '%' . $nama_liga . '%')->get()
        ]);
    }
    public function productDetail($id)
    {
        return response()->json([
            'productDetail' => Product::find($id)
        ]);
    }
    public function addWishlist(Request $request)
    {
        $validated = Validator::make(
            $request->all(),
            [
                "id_product" => "required",
                "user_id" => "required",
                "is_favorite" => "required",
            ]
        );
        if ($validated->fails()) {
            return response()->json([
                "message" => "failed",
                "error" => $validated->errors()
            ]);
        }
        $product = Product::find($request->id_product);
        if (empty($product)) {
            return response()->json([
                'message' => 'product tidak ditemukan'
            ]);
        } else {
            $favorite = Wishlist::where('user_id', $request->user_id)->where('product_id', $product->id)->first();
            if ($favorite) {
                Product::where('id', $product->id)->update([
                    'nama' => $product->nama,
                    'harga' => $product->harga,
                    'harga_nameset' => $product->harga_nameset,
                    'is_ready' => $product->is_ready,
                    'jenis' => $product->jenis,
                    'berat' => $product->berat,
                    'gambar' => $product->gambar,
                    'liga_id' => $product->liga_id,
                    'is_favorite' => 0,
                ]);
                Wishlist::where('product_id', $product->id)->delete();
                return response()->json([
                    'message' => 'Berhasil hapus dari Wihslist'
                ], 200);
                // return response()->json([
                //     'message' => 'Product ini sudah ada di Wishlist'
                // ]);
            } else {
                Product::where('id', $product->id)->update([
                    'nama' => $product->nama,
                    'harga' => $product->harga,
                    'harga_nameset' => $product->harga_nameset,
                    'is_ready' => $product->is_ready,
                    'jenis' => $product->jenis,
                    'berat' => $product->berat,
                    'gambar' => $product->gambar,
                    'liga_id' => $product->liga_id,
                    'is_favorite' => 1,
                ]);
                Wishlist::create([
                    'nama' => $product->nama,
                    'harga' => $product->harga,
                    'harga_nameset' => $product->harga_nameset,
                    'is_ready' => $product->is_ready,
                    'jenis' => $product->jenis,
                    'berat' => $product->berat,
                    'gambar' => $product->gambar,
                    'liga_id' => $product->liga_id,
                    'is_favorite' => $request->is_favorite,
                    'user_id' => $request->user_id,
                    'product_id' => $product->id,
                ]);
                return response()->json([
                    'message' => 'Berhasil menambahkan favorite'
                ], 200);
            }
        }
    }
    public function removeWihslist(Request $request)
    {
        $validated = Validator::make(
            $request->all(),
            [
                "id_product" => "required",
                "user_id" => "required",
                "is_favorite" => "required",
            ]
        );
        if ($validated->fails()) {
            return response()->json([
                "message" => "failed",
                "error" => $validated->errors()
            ]);
        }
        $product = Product::find($request->id_product);
        if (empty($product)) {
            return response()->json([
                'message' => 'Product ini tidak terdaftar'
            ]);
        } else {
            Product::where('id', $product->id)->update([
                'nama' => $product->nama,
                'harga' => $product->harga,
                'harga_nameset' => $product->harga_nameset,
                'is_ready' => $product->is_ready,
                'jenis' => $product->jenis,
                'berat' => $product->berat,
                'gambar' => $product->gambar,
                'liga_id' => $product->liga_id,
                'is_favorite' => 0,
            ]);
            Wishlist::where('product_id', $product->id)->delete();
            return response()->json([
                'message' => 'Berhasil hapus dari Favorite'
            ]);
        }
    }
    public function getWishlist($user_id)
    {
        $wihslist = Wishlist::where('user_id', $user_id)->get();
        return response()->json([
            'wishlist' => $wihslist
        ]);
    }
    public function searchWishlist($user_id, $nama_product)
    {
        $wihslist = Wishlist::where('user_id', $user_id)->where('nama', 'like', '%' . $nama_product . '%')->get();
        return response()->json([
            'wishlist' => $wihslist
        ]);
    }
    public function masukanKeranjang(Request $request)
    {
        $validated = Validator::make(
            $request->all(),
            [
                'product_id' => 'required',
                'jumlah_pesanan' => 'required',
                'user_id' => 'required',
            ],
            [
                'product_id.required' => 'product_id harus di isi',
                'jumlah_pesanan.required' => 'product_id harus di isi',
                'user_id.required' => 'product_id harus di isi',
            ]
        );
        if ($validated->fails()) {
            return response()->json([
                'message' => 'Gagal Menambahkan keranjang',
                'error' => $validated->errors()
            ], 400);
        }

        $products = Product::find($request->product_id);
        if ($products) {
            if (empty($request->nama)) {
                $total_harga = $request->jumlah_pesanan * $products->harga;
            } else {
                $total_harga = $request->jumlah_pesanan * ($products->harga + $products->harga_nameset);
            }
        } else {
            return response()->json([
                'message' => 'Product tidak terdaftar di database'
            ], 400);
        }

        //mengecek pesanan
        $pesanan = Pesanan::where('user_id', $request->user_id)->where('status', 0)->first();
        if (empty($pesanan)) {
            Pesanan::create([
                'user_id' => $request->user_id,
                'total_harga' => $total_harga,
                'status' => 0,
                'kode_unik' => mt_rand(100, 999)
            ]);
            $pesanan = Pesanan::where('user_id', $request->user_id)->where('status', 0)->first();
            $pesanan->kode_pemesanan = 'JP' . $pesanan->id;
            $pesanan->update();
        } else {
            $pesanan->total_harga = $pesanan->total_harga + $total_harga;
            $pesanan->update();
        }

        //pesanan detail
        PesananDetails::create([
            'product_id' => $request->product_id,
            'pesanan_id' => $pesanan->id,
            'gambar' => $products->gambar,
            'jumlah_pesanan' => $request->jumlah_pesanan,
            'nameset' => empty($request->nameset) ? $request->nameset : false,
            'nama' => empty($request->nama) ? $request->nama : false,
            'nama_product' => $products->nama,
            'nomor' => empty($request->nomor) ? $request->nomor : false,
            'total_harga' => $total_harga
        ]);

        return response()->json([
            'message' => 'Sukses masuk keranjang !'
        ]);
    }
    public function getPesananDetail(Request $request)
    {
        $pesanan = Pesanan::where('user_id', $request->user_id)->where('status', 0)->first();
        if ($pesanan) {
            $pesanan_detail = PesananDetails::where('pesanan_id', $pesanan->id)->get();
            return response()->json([
                'message' => 'Pesanan detail',
                'data' => $pesanan_detail
            ]);
        } else {
            return response()->json([
                'message' => 'Belum ada pesanan',
                'data' => []
            ]);
        }
    }
    public function getTotalHarga(Request $request)
    {
        $pesanan = Pesanan::where('user_id', $request->user_id)->where('status', 0)->get();
        return response()->json([
            'message' => 'Total Harga',
            'data' => $pesanan
        ]);
    }
    public function updatePesananDetail(Request $request)
    {
        $validated = Validator::make(
            $request->all(),
            [
                "user_id" => "required",
                "id" => "required",
                "methods" => "required",
                "product_id" => "required",
            ]
        );
        if ($validated->fails()) {
            return response()->json([
                'message' => 'failed',
                'error' => $validated->errors()
            ]);
        }
        $product = Product::where('id', $request->product_id)->first();
        $pesanan = Pesanan::where('user_id', $request->user_id)->where('status', 0)->first();
        $pesanan_detail = PesananDetails::where('pesanan_id', $pesanan->id)->where('id', $request->id)->first();
        if ($request->methods == 'tambah') {
            DB::table('pesanan_details')->where('id', $request->id)->update([
                'jumlah_pesanan' => $pesanan_detail->jumlah_pesanan + 1,
                'total_harga' => $pesanan_detail->total_harga + $product->harga
            ]);
            $pesanan = Pesanan::where('user_id', $request->user_id)->where('status', 0)->first();
            $pesanan_details = PesananDetails::where('pesanan_id', $pesanan->id)->sum('total_harga');
            $pesanan->total_harga = $pesanan_details;
            $pesanan->update();
            return response()->json([
                'message' => 'Berhasil update pesanan',
                'total_semua' => $pesanan_details
            ]);
        } else if ($request->methods == 'kurang') {
            $info = PesananDetails::where('id', $request->id)->first();
            DB::table('pesanan_details')->where('id', $request->id)->update([
                'jumlah_pesanan' => $pesanan_detail->jumlah_pesanan - 1,
                'total_harga' => $pesanan_detail->total_harga - $product->harga
            ]);
            $pesanan_details = PesananDetails::where('pesanan_id', $pesanan->id)->sum('total_harga');
            $pesanan->total_harga = $pesanan_details;
            $pesanan->update();
            $pesananDetail = PesananDetails::where('pesanan_id', $pesanan->id)->where('id', $request->id)->first();
            if ($pesananDetail->total_harga == 0) {
                DB::delete('DELETE FROM pesanan_details WHERE id = ?', [$pesananDetail->id]);
                DB::delete('DELETE FROM pesanans WHERE id = ?', [$pesanan->id]);
            }
            return response()->json([
                'message' => 'Berhasil update pesanan',
                'total_semua' => $pesanan_details
            ]);
        }
    }
    public function deletePesananDetailById(Request $request)
    {
        $validated = Validator::make(
            $request->all(),
            [
                "user_id" => "required",
                "id" => "required",
            ]
        );
        if ($validated->fails()) {
            return response()->json([
                'message' => 'failed',
                'error' => $validated->errors()
            ]);
        }
        $pesanan = Pesanan::where('user_id', $request->user_id)->where('status', 0)->first();
        $pesanan_detail = PesananDetails::where('pesanan_id', $pesanan->id)->where('id', $request->id)->first();
        if ($pesanan_detail) {
            DB::delete('DELETE FROM pesanan_details WHERE pesanan_id = ? AND id =?', [$pesanan->id, $request->id]);
            $pesanan_details = PesananDetails::where('pesanan_id', $pesanan->id)->sum('total_harga');
            $pesanan->total_harga = $pesanan_details;
            $pesanan->update();
            return response()->json([
                'status' => 'Berhasil Hapus Pesanan',
                'message' => 'Sukses hapus Pesanan !',
            ]);
        } else {
            return response()->json([
                'status' => 'Gagal Hapus Pesanan',
                'message' => 'Pesanan tidak ditemukan',
            ]);
        }
    }
    public function addHistory(Request $request)
    {
        $validated = Validator::make(
            $request->all(),
            [
                "user_id" => "required",
                "data" => "required|array",
            ]
        );
        if ($validated->fails()) {
            return response()->json([
                "message" => "failed",
                "error" => $validated->errors()
            ]);
        }
        $pesanan = Pesanan::where('user_id', $request->user_id)->where('status', 0)->first();
        if ($pesanan) {
            $pesanan_detail = PesananDetails::where('pesanan_id', $pesanan->id)->first();
            HistoryPesanan::insert($request->data);
            // HistoryPesanan::create([
            //     'jumlah_pesanan' => $pesanan_detail->jumlah_pesanan,
            //     'total_harga' => $pesanan_detail->total_harga,
            //     'nameset' => $pesanan_detail->nameset,
            //     'nama' => $pesanan_detail->nama,
            //     'nomor' => $pesanan_detail->nomor,
            //     'product_id' => $pesanan_detail->product_id,
            //     'pesanan_id' => $pesanan_detail->pesanan_id,
            //     'user_id' => $request->user_id,
            // ]);
            return response()->json([
                'message' => 'Berhasil disimpan ke history',
            ]);
        } else {
            return response()->json([
                'message' => 'Pesanan tidak ditemukan',
            ]);
        }
    }

    public function getPaymentChannels()
    {
        $tripay = new TripayController();
        $tripay->getPaymentChannels();
        return response()->json([
            'tripay' => $tripay
        ]);
    }
    public function requestTranscation(Request $request)
    {
        $tripay = new TripayController();
        $tripay->requestTranscation($request->method, $request->total, $request->order_item);
        return response()->json([
            'tripay' => $tripay,
            // 'method' => $request->method,
            // 'total' => $request->total,
        ]);
    }
}
