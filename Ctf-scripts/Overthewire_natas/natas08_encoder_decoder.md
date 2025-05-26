# 🔐 natas08_encoder_decoder.php

**Created:** 2025-05-24  
**Author:** Itacarambi  
**Challenge:** OverTheWire — Natas08  

---

## 🎯 Purpose

Tool built during the Natas08 challenge to handle the reversible encoding logic used in the level:   
`base64 → reverse → bin2hex`

and the reverse:   
`hex2bin → reverse → base64_decode`

Can be reused in similar CTFs or as a base for future tooling.

---

## ⚙️ Usage

Encode   
`php natas08_encoder_decoder.php encode "your_string"`

Decode   
`php natas08_encoder_decoder.php decode "encoded_string"`


## 💻 Script
```
<?php

function encodeSecret($secret) {
    return bin2hex(strrev(base64_encode($secret)));
}

function decodeSecret($encoded) {
    return base64_decode(strrev(hex2bin($encoded)));
}

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
```
