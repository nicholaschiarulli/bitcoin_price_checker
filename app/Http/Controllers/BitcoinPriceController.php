<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

class BitcoinPriceController extends Controller
{
    public function index(Request $request)
    {
        $currency = "usd";
        $btcValue = $this->getCurrentBtcPriceForCurrency($currency);
        
        return view('index', compact(['btcValue']));
    }

    public function getCurrentBtcPrice(Request $request)
    {
        $currency = $request->get('Currency') ?? "usd";
        $btcValue = $this->getCurrentBtcPriceForCurrency($currency);

        Inquiry::create(['CurrencyType' => $currency, 'CurrencyValue' => $btcValue]);

        return $btcValue;
    }

    private function getCurrentBtcPriceForCurrency($currency) {
        $currency = strtolower($currency);
        $url = "https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=$currency";
        $json = json_decode(file_get_contents($url));
        $btc = 0 ;

        $obj = $json->bitcoin;
        foreach($obj as $currentCurrency => $data){
            if($currentCurrency == $currency){
                $btc = $data;
            }
        }
        
        return $btc;
    }

    public function getInquiries(Request $request)
    {
        $inquiryData = Inquiry::all();

        return view('inquiry', compact(['inquiryData']));
    }
}
