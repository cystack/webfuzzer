POST tên người dùng và password vào `auth`, theo JSON `{'email': 'abc', 'password': 'def'}`.
Đặt header Authorization bằng `JWT <jwt_token>` với token nhận được sau khi POST vào `/auth`.