<?php

use Illuminate\Support\Facades\Config;
        
    function get_languages(){
        return \App\Models\Language::active() -> selection() ->get();
    }


    function get_default_lang(){
        return config::get('app.locale');
    }

