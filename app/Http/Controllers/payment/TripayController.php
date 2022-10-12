<?php

namespace App\Http\Controllers\payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TripayController extends Controller
{
    public function getPaymentChannels()
    {

        $apiKey = config('tripay.api_key');
        // dd($apiKey);

        $payload = ['code' => 'BNIVA'];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_FRESH_CONNECT  => true,
            // CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/merchant/payment-channel?' . http_build_query($payload),
            CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/merchant/payment-channel?',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $apiKey],
            CURLOPT_FAILONERROR    => false,
            CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
        ));

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        echo empty($error) ? $response : $error;
    }

    public function requestTranscation($method, $total, $order_item)
    {

        $apiKey       = config('tripay.api_key');
        $privateKey   = config('tripay.private_key');
        $merchantCode = config('tripay.merchant_code');
        // TIDAK WAJIB
        // $merchantRef  = 'nomor referensi merchant anda';
        $amount       = $total;

        $data = [
            // 'method'         => 'BRIVA',
            'method'         => $method,
            // 'merchant_ref'   => $merchantRef,
            'amount'         => $amount,
            'customer_name'  => 'Nama Pelanggan',
            'customer_email' => 'emailpelanggan@domain.com',
            'customer_phone' => '081234567890',
            // 'order_items'    => [
            //     [
            //         'sku'         => 'JP3',
            //         'name'        => 'BAYERN MUNCHEN 3RD 2018-2019',
            //         'price'       => 175000,
            //         'quantity'    => 1,
            //         'product_url' => 'https://tokokamu.com/product/nama-produk-1',
            //         'image_url'   => 'https://tokokamu.com/product/nama-produk-1.jpg',
            //     ],
            // ],
            'order_items' => $order_item,
            'return_url'   => 'https://domainanda.com/redirect',
            'expired_time' => (time() + (24 * 60 * 60)), // 24 jam
            // 'signature'    => hash_hmac('sha256', $merchantCode . $merchantRef . $amount, $privateKey)
            'signature'    => hash_hmac('sha256', $merchantCode .  $amount, $privateKey)
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_FRESH_CONNECT  => true,
            CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/transaction/create',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $apiKey],
            CURLOPT_FAILONERROR    => false,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => http_build_query($data),
            CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        echo empty($error) ? $response : $error;
    }
}
