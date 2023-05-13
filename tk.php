<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

/**
 * Summary of TokenGenerator
 */
class TokenGenerator {
    
    /**
     * Summary of generateToken
     * @param mixed $payload
     * @param mixed $key
     * @return |false
     */
    public function TokenEncoder(array $payload, string $key) : string | false {

        $jwt = JWT::encode($payload, $key, 'HS256');
        return $jwt;

    }

    /**
     * Summary of TokenDecoder
     * @param mixed $jwt
     * @param mixed $key
     * @return stdClass|false
     */
    public function TokenDecoder(string $jwt, OpenSSLAsymmetricKey $key) : stdClass | false {

        $jwt = JWT::decode($jwt, new Key($key, 'HS256'));
        return $jwt;
    }

    /**
     * Summary of GetPrivateKey
     * @param mixed $pk
     * @return OpenSSLAsymmetricKey|bool
     */
    public function GetPrivateKey() : OpenSSLAsymmetricKey {

        $passphrase = "1kball-ssh-key-chain-certificate";
        $privateKeyFile = __DIR__ . '/PrivateKey.pem';
        $privateKey = openssl_pkey_get_private(
        file_get_contents($privateKeyFile),
        $passphrase
        );
        //openssl_pkey_export($privateKey, $private_key_string);
        return $privateKey;
    }

    /**
     * Summary of GetPublicKey
     * @param mixed $privateKey
     * @return OpenSSLAsymmetricKey
     */
    public function GetPublicKey(?OpenSSLAsymmetricKey $privateKey) : OpenSSLAsymmetricKey {
        $publicKey = openssl_pkey_get_details($privateKey)['key'];
        return $publicKey;
    }

}

