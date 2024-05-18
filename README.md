# ⚡ PHP Starter Function

Oztek SMS company is prepared for SMS sending. This function can work on Appwrite 🚀

## 🧰 Usage

### POST /

```
Content-Type : application/json
```

```json
{
"to":"+XXXXXXXXXX",
"message":"Your message"
}
```

**Response**

Sample `200` Response:

```json
{
  "status": true,
  "message": "Sended message successfully"
}
```


## ⚙️ Configuration

| Setting           | Value              |
| ----------------- | ------------------ |
| Runtime           | PHP (8.0)          |
| Entrypoint        | `src/index.php`    |
| Build Commands    | `composer install` |
| Permissions       | `any`              |
| Timeout (Seconds) | 15                 |

## 🔒 Environment Variables

```
OZTEK_USER_ID=
OZTEK_USERNAME=
OZTEK_PASSWORD=
OZTEK_ORIGINATOR=
```
