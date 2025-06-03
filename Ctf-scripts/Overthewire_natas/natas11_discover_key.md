## 🔐 natas11_discover_key.py

**Created:** 2025-06-03  
**Author:** Itacarambi  
**Challenge:** [OverTheWire — Natas11](https://github.com/ItacarambiSec/CTFs/blob/main/OverTheWire/Natas/Natas11)

---

## 🎯 Purpose

Tool developed during the Natas11 challenge to perform a Known-Plaintext Attack on XOR-encrypted data. Its main goal is to discover the XOR secret key by comparing a known plaintext (the standard cookie data) with its corresponding ciphertext (the Base64-decoded cookie value). This is crucial for breaking simple XOR encryption schemes where the key is fixed.  

---

## ⚙️ Usage

This script requires the encoded cookie value and assumes the default plaintext.

To run:

python natas11_discover_key.py

Note: You may need to update the cookie_value_encoded variable in the script if you are testing with a different cookie value. The known_plaintext variable should match the standard data structure expected by the target application.

## 💻 Script

```python
import base64
import urllib.parse

cookie_value_encoded = "HmYkBwozJw4WNyAAFyB1VUcqOE1JZjUIBis7ABdmbU1GdGdfVXRnTRg%3D"
cookie_value_decoded_url = urllib.parse.unquote(cookie_value_encoded)
decoded_base64_bytes = base64.b64decode(cookie_value_decoded_url)
known_plaintext = b'{"showpassword":"no","bgcolor":"#ffffff"}'
key_material = bytearray()

for i in range(min(len(decoded_base64_bytes), len(known_plaintext))):
    key_material.append(decoded_base64_bytes[i] ^ known_plaintext[i])
print(f"XOR Key Material (string): {key_material.decode('latin-1')}")
```
