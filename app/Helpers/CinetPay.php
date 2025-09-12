<?php

namespace App\Helpers;

use Exception;

class CinetPay
{
    protected ?string $BASE_URL;

    public int|float $amount;
    public string $currency = 'XOF';
    public ?string $transaction_id;
    public ?string $customer_name;
    public ?string $customer_surname;
    public ?string $description;
    public ?array $invoice_data = null;

    public string $channels = 'ALL';
    public ?string $notify_url;
    public ?string $return_url;

    public string $metadata = "";
    public string $alternative_currency = "";
    public string $customer_email = "";
    public string $customer_phone_number = "";
    public string $customer_address = "";
    public string $customer_city = "";
    public string $customer_country = "";
    public string $customer_state = "";
    public string $customer_zip_code = "";
    
    public ?string $chk_payment_date;
    public ?string $chk_operator_id;
    public ?string $chk_payment_method;
    public ?string $chk_code;
    public ?string $chk_message;
    public ?string $chk_api_response_id;
    public ?string $chk_description;
    public ?string $chk_amount;
    public ?string $chk_currency;
    public ?string $chk_metadata;

    public function __construct(
        public int|string $site_id,
        public ?string $apikey,
        public bool $VerifySsl = false
    ) {
        $this->BASE_URL = 'https://api-checkout.cinetpay.com/v2/payment';
    }

    public function generatePaymentLink(?array $params): array
    {
        $this->checkDataExist($params, "payment");
        
        $this->transaction_id = $params['transaction_id'];
        $this->amount = $params['amount'];
        $this->currency = $params['currency'];
        $this->description = $params['description'];
        $this->customer_name = $params['customer_name'];
        $this->customer_surname = $params['customer_surname'];
        $this->notify_url = $params['notify_url'];
        $this->return_url = $params['return_url'];
        
        if (!empty($params['channels'])) $this->channels = $params['channels'];
        if (!empty($params['alternative_currency'])) $this->alternative_currency = $params['alternative_currency'];
        if (!empty($params['customer_email'])) $this->customer_email = $params['customer_email'];
        if (!empty($params['customer_phone_number'])) $this->customer_phone_number = $params['customer_phone_number'];
        if (!empty($params['customer_address'])) $this->customer_address = $params['customer_address'];
        if (!empty($params['customer_city'])) $this->customer_city = $params['customer_city'];
        if (!empty($params['customer_country'])) $this->customer_country = $params['customer_country'];
        if (!empty($params['customer_state'])) $this->customer_state = $params['customer_state'];
        if (!empty($params['customer_zip_code'])) $this->customer_zip_code = $params['customer_zip_code'];
        if (!empty($params['metadata'])) $this->metadata = $params['metadata'];
        if (!empty($params['invoice_data'])) $this->invoice_data = $params['invoice_data'];

        $data = $this->getData();

        $response = $this->callCinetpayWsMethod($data, $this->BASE_URL);
        if ($response === false) {
            throw new Exception("Un problème est survenu lors de l'appel du WS !");
        }

        $paymentUrl = json_decode($response, true);

        if (is_array($paymentUrl)) {
            if (empty($paymentUrl['data'])) {
                $message = 'Erreur CinetPay - Code: ' . ($paymentUrl['code'] ?? '') . 
                           ', Message: ' . ($paymentUrl['message'] ?? '') . 
                           ', Description: ' . ($paymentUrl['description'] ?? '');
                throw new Exception($message);
            }
        }

        return $paymentUrl;
    }

    public function checkDataExist($param, $action)
    {
        if (empty($this->apikey)) {
            throw new Exception("Erreur: Apikey non défini");
        }
        if (empty($this->site_id)) {
            throw new Exception("Erreur: Site_id non défini");
        }
        if (empty($param['transaction_id'])) {
            $this->transaction_id = $this->generateTransId();
        }

        if ($action == "payment") {
            if (empty($param['amount'])) {
                throw new Exception("Erreur: Amount non défini");
            }
            if (empty($param['currency'])) {
                throw new Exception("Erreur: Currency non défini");
            }
            if (empty($param['customer_name'])) {
                throw new Exception("Erreur: Customer_name non défini");
            }
            if (empty($param['description'])) {
                throw new Exception("Erreur: description non défini");
            }
            if (empty($param['customer_surname'])) {
                throw new Exception("Erreur: Customer_surname non défini");
            }
            if (empty($param['notify_url'])) {
                throw new Exception("Erreur: notify_url non défini");
            }
            if (empty($param['return_url'])) {
                throw new Exception("Erreur: return_url non défini");
            }
        } elseif ($action == "paymentCard") {
            if (empty($param['customer_email'])) {
                throw new Exception("Erreur: customer_email non défini (champs requis pour le paiement par carte)");
            }
            if (empty($param['customer_phone_number'])) {
                throw new Exception("Erreur: custom_phone_number non défini (champs requis pour le paiement par carte)");
            }
            if (empty($param['customer_address'])) {
                throw new Exception("Erreur: Customer_address non défini (champs requis pour le paiement par carte)");
            }
            if (empty($param['customer_city'])) {
                throw new Exception("Erreur: customer_city non défini (champs requis pour le paiement par carte)");
            }
            if (empty($param['customer_country'])) {
                throw new Exception("Erreur: customer_country non défini (champs requis pour le paiement par carte)");
            }
            if (empty($param['customer_state'])) {
                throw new Exception("Erreur: Customer_address non défini (champs requis pour le paiement par carte)");
            }
            if (empty($param['customer_zip_code'])) {
                throw new Exception("Erreur: customer_zip_code non défini (champs requis pour le paiement par carte)");
            }
        }
    }

    private function callCinetpayWsMethod($params, $url, $method = 'POST')
    {
        if (!function_exists('curl_version')) {
            throw new Exception("Vous devez activer curl ou allow_url_fopen pour utiliser CinetPay");
        }

        try {
            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 45,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => $method,
                CURLOPT_POSTFIELDS => json_encode($params),
                CURLOPT_SSL_VERIFYPEER => $this->VerifySsl,
                CURLOPT_HTTPHEADER => [
                    "content-type:application/json",
                    "cache-control:no-cache"
                ],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);

            if ($err) {
                throw new Exception("cURL Error: " . $err);
            }

            return $response;
        } catch (Exception $e) {
            throw new Exception("Erreur CinetPay: " . $e->getMessage());
        }
    }

    public function getData()
    {
        return [
            "amount" => $this->amount,
            "apikey" => $this->apikey,
            "site_id" => $this->site_id,
            "currency" => $this->currency,
            "transaction_id" => $this->transaction_id,
            "customer_surname" => $this->customer_surname,
            "customer_name" => $this->customer_name,
            "description" => $this->description,
            "notify_url" => $this->notify_url,
            "return_url" => $this->return_url,
            "channels" => $this->channels,
            "alternative_currency" => $this->alternative_currency,
            "invoice_data" => $this->invoice_data,
            "customer_email" => $this->customer_email,
            "customer_phone_number" => $this->customer_phone_number,
            "customer_address" => $this->customer_address,
            "customer_city" => $this->customer_city,
            "customer_country" => $this->customer_country,
            "customer_state" => $this->customer_state,
            "customer_zip_code" => $this->customer_zip_code,
            "metadata" => $this->metadata,
        ];
    }

    public function getPayStatus($id_transaction, $site_id)
    {
        $data = $this->getPayStatusArray($id_transaction, $site_id);
        $response = $this->callCinetpayWsMethod($data, $this->BASE_URL . "/check");

        if ($response === false) {
            throw new Exception("Un problème est survenu lors de la vérification du statut");
        }

        $statusPayment = json_decode($response, true);

        if (is_array($statusPayment) && empty($statusPayment['data'])) {
            $message = 'Erreur CinetPay - Code: ' . ($statusPayment['code'] ?? '') . 
                       ', Message: ' . ($statusPayment['message'] ?? '') . 
                       ', Description: ' . ($statusPayment['description'] ?? '');
            throw new Exception($message);
        }

        $this->chk_payment_date = $statusPayment['data']['payment_date'];
        $this->chk_operator_id = $statusPayment['data']['operator_id'];
        $this->chk_payment_method = $statusPayment['data']['payment_method'];
        $this->chk_amount = $statusPayment['data']['amount'];
        $this->chk_currency = $statusPayment['data']['currency'];
        $this->chk_code = $statusPayment['code'];
        $this->chk_message = $statusPayment['message'];
        $this->chk_api_response_id = $statusPayment['api_response_id'];
        $this->chk_description = $statusPayment['data']['description'];
        $this->chk_metadata = $statusPayment['data']['metadata'];

        return $statusPayment;
    }

    private function getPayStatusArray($id_transaction, $site_id)
    {
        return [
            'apikey' => $this->apikey,
            'site_id' => $site_id,
            'transaction_id' => $id_transaction
        ];
    }

    public function generateTransId(): string
    {
        $timestamp = time();
        $parts = explode(' ', microtime());
        $id = ($timestamp + $parts[0] - strtotime('today 00:00')) * 10;
        return "SDK-PHP" . sprintf('%06d', $id) . mt_rand(100, 9999);
    }

    public function setTransId($id)
    {
        $this->transaction_id = $id;
        return $this;
    }
}