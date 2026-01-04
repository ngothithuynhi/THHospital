# Clinical Decision Support Web (Personal Use)

## 1. Mục tiêu dự án

Đây là một **web tra cứu hỗ trợ quyết định lâm sàng dành cho bác sĩ cá nhân**, phục vụ:

- Nhắc nhở **Thuốc – ICD – Bảo hiểm y tế**
- Nhắc **Chỉ định cận lâm sàng phù hợp ICD**
- Cảnh báo **tương tác thuốc**
- Hỗ trợ **giải trình xuất toán BHYT**

> ⚠️ Lưu ý:  
> - Web **KHÔNG kết nối** với hệ thống HIS  
> - **KHÔNG lưu thông tin bệnh nhân**  
> - Chỉ mang tính **hỗ trợ tham khảo**, quyết định cuối cùng thuộc bác sĩ điều trị

---

## 2. Đối tượng sử dụng

- Bác sĩ lâm sàng (sử dụng cá nhân)
- Có thể chia sẻ cho đồng nghiệp nếu cần (không bắt buộc)

---

## 3. Phạm vi chức năng

### 3.1 Tra cứu Thuốc – ICD – BHYT

**Input**
- Tên thuốc / hoạt chất
- ICD chẩn đoán (chính / phụ)

**Output**
- ICD được BHYT chấp nhận
- ICD thường bị xuất toán
- Điều kiện thanh toán BHYT
- Ghi chú thực tế quyết toán

---

### 3.2 Tra cứu Cận lâm sàng – ICD

Áp dụng cho:
- CT
- MRI
- Xét nghiệm đặc biệt
- CLS chi phí cao

Hiển thị:
- ICD phù hợp
- ICD hay bị từ chối
- Ghi chú thực tế xét duyệt BHYT

---

### 3.3 Cảnh báo Tương tác thuốc

- Chọn từ 2–5 thuốc
- Hiển thị mức độ:
  - 🟥 Nghiêm trọng (tránh phối hợp)
  - 🟧 Cần theo dõi
  - 🟩 An toàn
- Có ghi chú xử trí lâm sàng

---

### 3.4 Hỗ trợ Giải trình Xuất toán BHYT

- Sinh **khung giải trình mẫu**
- Nội dung bao gồm:
  - Lý do lâm sàng
  - Căn cứ hướng dẫn / thực tế điều trị
  - Giải thích trường hợp ICD/thuốc/CLS không khớp máy
- Cho phép copy ra Word để chỉnh sửa

---

## 4. Quản lý & Cập nhật dữ liệu (KHÔNG sửa code)

### 4.1 Dữ liệu quản lý
- Thuốc
- ICD
- Cận lâm sàng
- Điều kiện thanh toán BHYT

### 4.2 Cách cập nhật
- Thêm / sửa trực tiếp qua giao diện web
- Import dữ liệu bằng **Excel**
- ❌ Không cần chỉnh sửa code khi thêm thuốc/CLS mới

---

## 5. Yêu cầu kỹ thuật

- Web chạy độc lập (local / server nội bộ)
- Truy cập qua trình duyệt
- Không kết nối CSDL bệnh viện
- Không tự động kê đơn
- Không ghi nhận thông tin bệnh nhân

---

## 6. Giao diện

- Đơn giản
- Tra cứu nhanh
- Gõ là ra kết quả
- Ưu tiên tốc độ và tính thực tế, không cần giao diện phức tạp

---

## 7. Pháp lý & Trách nhiệm

Ứng dụng chỉ mang tính **hỗ trợ tham khảo**.  
Quyết định chẩn đoán và điều trị thuộc về bác sĩ điều trị.

---

## 8. Định hướng mở rộng (không bắt buộc)

- Chia sẻ quyền truy cập cho đồng nghiệp
- Chuẩn hóa dữ liệu theo khoa/phòng
- Bổ sung ghi chú theo thực tế quyết toán từng bệnh viện
