<?php
/**
 * ================================================================
 * Script: natas08_encoder_decoder.php
 * Author: Itacarambi
 * Created on: 2025-05-24
 *
 * 🧠 Purpose:
 * Encode or decode a string using a reversible transformation chain:
 * base64 → reverse → bin2hex (and vice versa).
 * 
 * This tool was built specifically for **educational purposes** to solve
 * **Natas08** (OverTheWire CTF), where the password is obfuscated using
 * this exact pattern.
 * 
 * It can be reused as a **reference tool** for future scripts involving
 * simple encoding/decoding, reversible transformations, or CTF automation.
 *
 * 📦 Usage:
 * 
 *  Encode a string:
 *     php natas08_encoder_decoder.php encode "your_secret"
 * 
 *  Decode a hex-encoded string:
 *     php natas08_encoder_decoder.php decode "encoded_value"
 *
 * ================================================================
 */

/**
 * Encode using base64 → reverse → bin2hex
 */
function encodeSecret($secret) {
    return bin2hex(strrev(base64_encode($secret)));
}

/**
 * Decode using hex2bin → reverse → base64_decode
 */
function decodeSecret($encoded) {
    return base64_decode(strrev(hex2bin($encoded)));
}

// Expect exactly 2 arguments after the script name
if ($argc !== 3) {
    echo "Usage: php natas08_encoder_decoder.php [encode|decode] <string>\n";
    exit(1);
}

$mode = $argv[1];
$input = $argv[2];

if ($mode === 'encode') {
    echo encodeSecret($input) . "\n";
} elseif ($mode === 'decode') {
    echo decodeSecret($input) . "\n";
} else {
    echo "Invalid mode. Use 'encode' or 'decode'.\n";
    exit(1);
}
