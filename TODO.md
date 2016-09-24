# Các cải tiến trong những phiên bản tiếp theo

## Core
- Web Service của w3af hoạt động không ổn định và còn nhiều lỗi, sẽ phải sửa hoặc viết lại hoàn toàn
- Bổ sung agent trên server core để quản lý hoạt động của w3af và giao tiếp với các thành phần khác của WebFuzzer, hiện tại giao tiếp đang là một chiều từ WF -> w3af

## Server
- Kiến trúc hàng đợi thông điệp và gửi nhận còn nhiều bất cập, cần cải tiến để dễ dàng scale hơn
- Quản lý API Key và các gói dịch vụ hiệu quả hơn
- Thêm cảnh báo email đến user khi quét xong

## Client
- Sử dụng AngularJS thay thế hoàn toàn cho PHP đang sử dụng
- Bổ sung chức năng xuất báo cáo

## Tài liệu
- Xây dựng trang tài liệu hướng dẫn sử dụng API
