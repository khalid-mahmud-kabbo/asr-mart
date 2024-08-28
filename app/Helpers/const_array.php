<?php

use App\Models\Currency;

function currency_array($currency = null)
{
    if ($currency == null) {
        return Currency::get();
    } else {
        return Currency::where('currency', '!=', $currency)->get();
    }
}

function country($input = null)
{
    $output = array(
            "BG" => "Bagerhat",
            "BD" => "Bandarban",
            "BN" => "Barguna",
            "BS" => "Barishal",
            "BH" => "Bhola",
            "BO" => "Bogura",
            "BR" => "Brahmanbaria",
            "CD" => "Chandpur",
            "CT" => "Chattogram",
            "CN" => "Chuadanga",
            "CO" => "Comilla",
            "CB" => "Cox's Bazar",
            "DH" => "Dhaka",
            "DN" => "Dinajpur",
            "FR" => "Faridpur",
            "FN" => "Feni",
            "GB" => "Gaibandha",
            "GZ" => "Gazipur",
            "GP" => "Gopalganj",
            "HB" => "Habiganj",
            "JM" => "Jamalpur",
            "JS" => "Jashore",
            "JK" => "Jhalokathi",
            "JD" => "Jhenaidah",
            "JP" => "Joypurhat",
            "KH" => "Khagrachhari",
            "KL" => "Khulna",
            "KR" => "Kishoreganj",
            "KG" => "Kurigram",
            "KT" => "Kushtia",
            "LK" => "Lakshmipur",
            "LM" => "Lalmonirhat",
            "MD" => "Madaripur",
            "MG" => "Magura",
            "MN" => "Manikganj",
            "MP" => "Meherpur",
            "MB" => "Moulvibazar",
            "MS" => "Munshiganj",
            "MY" => "Mymensingh",
            "NG" => "Naogaon",
            "NL" => "Narail",
            "NR" => "Narayanganj",
            "NS" => "Narsingdi",
            "NT" => "Natore",
            "NK" => "Netrokona",
            "NM" => "Nilphamari",
            "NH" => "Noakhali",
            "PB" => "Pabna",
            "PC" => "Panchagarh",
            "PK" => "Patuakhali",
            "PZ" => "Pirojpur",
            "RJ" => "Rajbari",
            "RAJ" => "Rajshahi",
            "CN" => "Chapai Nawabganj",
            "RM" => "Rangamati",
            "RN" => "Rangpur",
            "ST" => "Satkhira",
            "SP" => "Shariatpur",
            "SH" => "Sherpur",
            "SG" => "Sirajganj",
            "SN" => "Sunamganj",
            "SY" => "Sylhet",
            "TG" => "Tangail",
            "TK" => "Thakurgaon"
    );

    if (is_null($input)) {
        return $output;
    } else {

        return $output[$input];
    }
}
