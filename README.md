# 🔒 Flowaxy Session

**Flowaxy Session** is a lightweight PHP library for secure and easy session management.  
Perfect for Flowaxy CMS, landing pages, web apps, and custom PHP projects.

---

## ✨ Features

✅ Simple session initialization  
✅ Namespaced keys to prevent conflicts (`s_key`)  
✅ Clean API: `start()`, `set()`, `get()`, `remove()`, `destroy()`  
✅ Auto-integration with [`flowaxy/cookie`](https://github.com/flowaxy/cookie)  
✅ Compatible with PHP 8.2+

---

## ⚙️ Installation

Install via Composer:

```bash
composer require flowaxy/session
```

> **Dependency:** To enable full functionality (like cookie cleanup), install [flowaxy/cookie](https://github.com/flowaxy/cookie):

```bash
composer require flowaxy/cookie
```

---

## 🧪 Usage Example

```php
use Flowaxy\Session;

// Start session
Session::start();

// Set value
Session::set('user_id', 42);

// Get value
$userId = Session::get('user_id');

// Remove value
Session::remove('user_id');

// Destroy session
Session::destroy();
```

> 💡 `destroy()` also clears the cookie via `Flowaxy\Cookie` if the library is available.

---

## 📌 Requirements

- PHP 8.2+
- Composer
- Optional: [`flowaxy/cookie`](https://github.com/flowaxy/cookie)

---

## 🔗 Links

- GitHub: [github.com/flowaxy/session](https://github.com/flowaxy/session)
- Package: [packagist.org/packages/flowaxy/session](https://packagist.org/packages/flowaxy/session)
- Cookie Manager: [github.com/flowaxy/cookie](https://github.com/flowaxy/cookie)
- Flowaxy CMS: [flowaxy.dev](https://cms.flowaxy.com)

---

## 🏷️ Version

**v1.0.0** — Stable  
🧰 Follows Semantic Versioning (SemVer)

---

## 📃 License

[MIT License](LICENSE)

---

Made with ❤️ for developers.
