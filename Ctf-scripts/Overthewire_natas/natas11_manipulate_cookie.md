## 🔐 natas11_manipulate_cookie.py

**Created:** 2025-05-24  
**Author:** Itacarambi  
**Challenge:** [OverTheWire — Natas11](https://github.com/ItacarambiSec/CTFs/blob/main/OverTheWire/Natas/Natas11)

---

## 🎯 Purpose

Tool developed during the Natas11 challenge to forge and encrypt a malicious cookie value. After discovering the secret XOR key, this script takes the desired data (e.g. modifying showpassword to "yes"), encodes it into JSON, encrypts it using the discovered XOR key, and finally encodes the result into Base64. The output is a cookie string ready to use for injection.

---

## ⚙️ Usage

This script requires the XOR key (which must be discovered first, for example using `natas11_discover_key.py`).

To run:

`python natas11_manipulate_cookie.py`

Note: Make sure the key variable in the script is updated with the correct discovered XOR `key`. Modify the `desired_data` dictionary to reflect the specific payload you want to inject.

## 💻 Script

```python
import json
import base64

key = 'eDWo' # Make sure this is the correct discovered key
desired_data = {
    "showpassword": "yes",
    "bgcolor": "#ffffff"
}
json_string = json.dumps(desired_data)
def xor_encrypt(data_bytes, key_bytes):
    output_bytes = bytearray()
    key_len = len(key_bytes)
    for i in range(len(data_bytes)):
        output_bytes.append(data_bytes[i] ^ key_bytes[i % key_len])
    return bytes(output_bytes)
json_bytes = json_string.encode('utf-8')
key_bytes = key.encode('utf-8')
xor_encrypted_bytes = xor_encrypt(json_bytes, key_bytes)
base64_encoded_bytes = base64.b64encode(xor_encrypted_bytes)
final_cookie_value = base64_encoded_bytes.decode('utf-8')
print(f"Valor final do cookie 'data': {final_cookie_value}")
```
