<?php
/**
 * secret_tool.php
 * 
 * Script criado durante a resolução do desafio Natas8 (OverTheWire).
 * Codifica e decodifica strings usando: base64 → reverse → hex.
 * 
 * Uso:
 *   php secret_tool.php encode "minha_senha"
 *   php secret_tool.php decode "string_codificada"
 */

function encodeSecret($secret) {
    return bin2hex(strrev(base64_encode($secret)));
}

function decodeSecret($encoded) {
    return base64_decode(strrev(hex2bin($encoded)));
}

if ($argc !== 3) {
    echo "Uso: php secret_tool.php [encode|decode] <string>\n";
    exit(1);
}

$mode = $argv[1];
$input = $argv[2];

if ($mode === 'encode') {
    echo encodeSecret($input) . "\n";
} elseif ($mode === 'decode') {
    echo decodeSecret($input) . "\n";
} else {
    echo "Modo inválido. Use 'encode' ou 'decode'.\n";
    exit(1);
}

