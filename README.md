# ⚡ OZTEK SMS API FOR APPWRITE FUNCTIONS

Oztek SMS company is prepared for SMS sending. This function can work on Appwrite 🚀

## Becareful

No user restrictions or tokens are used in the function. I recommend removing `any` permission from the event access section

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

**Dart&Flutter Usage**

```dart
import 'package:appwrite/appwrite.dart';

Client client = Client()
    .setEndpoint('https://cloud.appwrite.io/v1') // Your API Endpoint
    .setProject('5df5acd0d48c2'); // Your project ID

Functions functions = Functions(client);

var jsonData = {
      "to": "+XXXXXXXXXX", // Receiver phone number, starts with +
      "message": "Hello World with flutter", // Message
};

Execution result = await functions.createExecution(
    functionId: '<FUNCTION_ID>', // Your function id
    body: '/', 
    xasync: false,
    path: '/',
    method: ExecutionMethod.pOST,
    headers: {"Content-Type": "application/json"},
);

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
