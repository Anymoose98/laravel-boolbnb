<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

'paths' => ['*'], // Oppure specifica percorsi per limitare CORS a determinate rotte
'allowed_methods' => ['*'], // Metodi HTTP consentiti
'allowed_origins' => ['http://127.0.0.1:8000'], // Origini consentite. Usa ['*'] per consentire tutte le origini
'allowed_origins_patterns' => [],
'allowed_headers' => ['Content-Type', 'X-Requested-With'], // Aggiungi qui gli header consentiti
'exposed_headers' => [],
'max_age' => 0,
'supports_credentials' => false, // Imposta su true se le richieste devono essere effettuate con credenziali


];
