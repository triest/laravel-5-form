<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Bid extends BidAbs
    {
        //
        protected $fillable
                = [
                        'name',
                        'description',
                        'phone',
                ];
    }
