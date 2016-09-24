## WebFuzzer là gì?
- Một công cụ dò quét lỗ hổng web được phân phối dưới dạng dịch vụ online (Software As A Service)
	- Input: domain ứng dụng web
	- Output: danh sách lỗ hổng đang tồn tại, báo cáo, biểu đồ, hướng dẫn khắc phục
- Đưa ra giải pháp vá lỗ hổng sau khi tìm thấy
	- Tự động sinh rule cho modsecurity, iptable và cho phép người dùng tải về để cập nhật vào sản phẩm của họ
	- Hướng người dùng sử dụng Web Application Firewall và vá lỗ hổng trên đó

## Tính năng
- Dễ sử dụng:
	- Giao diện web thân thiện
	- Không cần cài đặt, không cần quan tâm đến cấu hình máy tính
- Opensource: được phát triển dựa trên [w3af](https://github.com/andresriancho/w3af), khả năng mở rộng cao
- Phát hiện được hơn 200 loại lỗ hổng, và sẽ còn mở rộng tiếp
- Xử lý phân tán, cho phép scan một số lượng lớn ứng dụng web đồng thời
- REST API: Hướng đến người dùng chuyên gia, họ có khả năng tự xây dựng những công cụ Scanner trên hạ tầng WebFuzzer


## Kiến trúc sản phẩm
