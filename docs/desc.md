# RiSk[Solutions]

- Tên nhóm: **Cystack**
- Tên giải pháp: **WebFuzzer**

--------------------

## WebFuzzer là gì?
- Một giải pháp **kiểm thử an ninh ứng dụng web** được phân phối dưới dạng dịch vụ online (Software As A Service)
	- Input: domain ứng dụng web
	- Output: danh sách lỗ hổng đang tồn tại, báo cáo, biểu đồ, hướng dẫn khắc phục
- Đưa ra biện pháp **vá lỗ hổng** sau khi tìm thấy lỗi
	- Tự động sinh rule cho modsecurity, iptable và cho phép người dùng tải về để cập nhật vào sản phẩm của họ
	- Hướng người dùng sử dụng Web Application Firewall và vá lỗ hổng trên đó

## Tính năng
- **Dễ sử dụng:**
	- Giao diện web thân thiện
	- Không cần cài đặt, không cần quan tâm đến cấu hình máy tính
- **Opensource**, được phát triển dựa trên [w3af](https://github.com/andresriancho/w3af), khả năng mở rộng cao
- Phát hiện được hơn **200 loại lỗ hổng**, và sẽ còn mở rộng tiếp
- **Xử lý phân tán**, cho phép scan một số lượng lớn ứng dụng web đồng thời
- **REST API**: Hướng đến người dùng chuyên gia, họ có khả năng tự xây dựng những công cụ Scanner trên hạ tầng WebFuzzer
- **Đa nền tảng**: Hiện tại là Web Interface, tương lai sẽ là CLI, Mobile, PC vì đã có API hỗ trợ

## Kiến trúc sản phẩm
![alt text](assets/architecture.png)

## Hướng dẫn cài đặt (dành cho nhà cung cấp sản phẩm, không dành cho người dùng cuối)
1. Cài w3af trên các server riêng biệt và khởi động tiến trình w3af_api. Trên mỗi server có thể mở nhiều tiến trình này tùy thuộc vào cấu hình
2. Cài đặt RabbitMQ làm hàng đợi thông điệp
3. Cấu hình Server và Dispatcher làm Producer và Consumer cho hàng đợi trên, đồng thời cấu hình đến danh sách server w3af theo ip và port
4. Thiết lập môi trường cho Server Flask bằng nginx, gunicorn
5. Khởi động server

## Giao diện
![alt text](assets/wf_domain.PNG)

![alt text](assets/wf_vuln.png)

![alt text](assets/wf_vuln_detail.png)

