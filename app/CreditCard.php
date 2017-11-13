<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    protected $fillable = ['client_id', 'billingAddressCity', 'billingAddressComplement', 'billingAddressCountry', 'billingAddressDistrict', 'billingAddressNumber', 'billingAddressPostalCode', 'billingAddressState', 'billingAddressStreet', 'creditCardHolderAreaCode', 'creditCardHolderBirthDate', 'creditCardHolderCPF', 'creditCardHolderName', 'creditCardHolderPhone', 'cardNumber', 'ccv', 'mes', 'ano', 'status'];
}
