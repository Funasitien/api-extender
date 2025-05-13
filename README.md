### 🧩 API-Extender – Extend Azuriom's API Functionality

Easily extend the capabilities of your Azuriom website with additional API endpoints.
Includes API key authentication for secure access.

---

### 🔐 Authentication

All requests (unless specified) require an API key.

**Header format:**

```
API-Key: your_api_key
```

---

### 📘 Available Endpoints

| Endpoint                                   | Requires API Key | Notes                      |
| ------------------------------------------ | ---------------- | -------------------------- |
| `GET /servers`                             | ✅ Yes            |                            |
| `GET /roles`                               | ✅ Yes            |                            |
| `GET /users`                               | ✅ Yes            |                            |
| `GET /money`                               | ✅ Yes            |                            |
| `GET /social`                              | ✅ Yes            |                            |
| `GET /images/{type}/{rendertype}/{player}` | ❌ No             | Requires `skin-api` plugin |

---

### 💡 Feature Requests

Want more endpoints or features in API-Extender?

👉 [Join our Discord server](https://discord.gg/Bnpw2awVRV) and share your ideas with us!
