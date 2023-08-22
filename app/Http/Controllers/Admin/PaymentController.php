<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\PaymentRequest;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'service_id' => 'required',
            'street' => 'required',
            'building' => 'required',
            'city' => 'required',
            'date' => 'required|date'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        $service = Service::query()->where('id', $request->service_id)->first();

        $amount_cents = $service->price * 100;

        // Get Auth Token
        $response = Http::withHeaders(['content-type' => 'application/json'])->post(
            "https://accept.paymobsolutions.com/api/auth/tokens",

            [
                "username" => '01021811237',
                'password' => 'Hamo@108940'
            ]
        );

        $auth_token = $response->json('token');

        // Get Order Id
        $response_final = Http::withHeaders(['content-type' => 'application/json'])
            ->post(
                'https://accept.paymobsolutions.com/api/ecommerce/orders',
                [
                    "auth_token" => $auth_token,
                    "delivery_needed" => "false",
                    "amount_cents" => 10000,
                    "items" => [
                        [
                            "name" => $service->title(),
                            "amount_cents" => $amount_cents,
                            "description" => $service->description(),
                            "quantity" => "1"
                        ]
                    ]
                ]
            );

        $order_id = $response_final->json('id');


        // Make Order
        $response_final_final = Http::withHeaders(['content-type' => 'application/json'])->post(
            "https://accept.paymobsolutions.com/api/acceptance/payment_keys",
            [
                "auth_token" => $auth_token,
                "expiration" => 36000,
                "amount_cents" => $amount_cents,

                "order_id" => $order_id,
                "billing_data" => [
                    "apartment" => "NA",
                    "email" => "mohamed@gmail.com",

                    "floor" => "NA",

                    "first_name" => "mohamed",
                    "street" => $request->street,
                    "building" => $request->building,

                    "phone_number" => "01021811237" ?? '',
                    "shipping_method" => "NA",
                    "postal_code" => "NA",

                    "city" => $request->city,
                    "country" => "NA",
                    "last_name" => "ayman",
                    "state" => "NA"
                ],

                "currency" => "EGP",
                "integration_id" => '3972828'
            ]
        );

        $token = $response_final_final->json('token');

        $order = new Order();
        $order->street = $request->street;
        $order->building = $request->building;
        $order->city = $request->city;
        $order->user_id = auth('api')->user()->id;
        $order->service_id = $request->service_id;
        $order->date = $request->date;
        $order->save();

        return response()->json([
            'pay' => "https://accept.paymob.com/api/acceptance/iframes/770265?payment_token=$token",
        ]);
    }

    public function callback(Request $request)
    {
        $data = $request->all();

        //        dd($data);
        ksort($data);
        $hmac = $data['hmac'];
        $array = [
            'amount_cents',
            'created_at',
            'currency',
            'error_occured',
            'has_parent_transaction',
            'id',
            'integration_id',
            'is_3d_secure',
            'is_auth',
            'is_capture',
            'is_refunded',
            'is_standalone_payment',
            'is_voided',
            'order',
            'owner',
            'pending',
            'source_data_pan',
            'source_data_sub_type',
            'source_data_type',
            'success',
        ];
        $connectedString = '';
        foreach ($data as $key => $element) {
            if (in_array($key, $array)) {
                $connectedString .= $element;
            }
        }
        $secret = env('PAYMOB_HMAC', 'B25FE9EC3B8C8C76ACFABDFE7E4E8B14');
        $hashed = hash_hmac('sha512', $connectedString, $secret);
        if ($hashed == $hmac) {
            return response()->json("secure");
            exit;
        }
        return response()->json("not secure");
        exit;
    }
}
