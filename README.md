# DỰ ÁN 1 2022 - FPOLY Teacher Tool

# Bắt đầu thiết lập

- Sau khi có giải nén mã nguồn:
  Nếu bạn chạy trên localhost của máy chủ ảo như Xampp,... bạn thiết lập như sau:

# 1. Config Databse:

- Sau khi có file database: Bạn tạo database và import dữ liệu vào phpmyadmin

Truy cập đến folder/configs/Database.php -> thay đổi các thông tin phù hợp cho máy ảo của bạn
HOSTNAME, USERNAME, PASSWORD, DATABASE, PORT

# 2. Config Base Url Cho dự án

# Đối với máy chủ ảo:

1. Auth - người dùng: không tính thư mục (admin)

Truy cập folder/bootstrap.php -> thay đổi biến $base_url trong block else với mặc định
$base_url = 'http://' . $\_SERVER['HTTP_HOST'] . '/path_folder/' -> (path_folder: đường dẫn thư mục htdocs chứa dự án)

2. Admin (thư mục chứ source: admin)

Truy cập folder/admin/bootstrap.php -> thay đổi biến $base_url trong block if và else

$base_url = 'http://' . $\_SERVER['HTTP_HOST'] . '/path_folder/admin/'
$base = 'http://' . $\_SERVER['HTTP_HOST'] . '/path_folder/'

-> (path_folder: đường dẫn thư mục htdocs chứa dự án)

# Đối với deploy lên môi trường thực tế (hosting, vps, ...):

1. Auth - người dùng: không tính thư mục (admin)

- Truy cập folder/bootstrap.php -> thay đổi biến $base_url trong block else với mặc định
  $base_url = 'http://' . $\_SERVER['HTTP_HOST'] . '/'

2. Admin (thư mục chứ source: admin)

Truy cập folder/admin/bootstrap.php -> thay đổi biến $base_url trong block if và else

# Nếu bạn deploy admin lên subdomain config như sau:

- Đặt thư mục gốc path_domain/admin hoặc đường dẫn đến thư mục admin

  $base_url = 'http://' . $\_SERVER['HTTP_HOST'] . '/'
  $base = path_domain . '/'

# Ngược lại:

- Thiết lập như sau
  $base_url = path_domain . '/admin/'
  $base = path_domain . '/'

-> (path_domain: đường dẫn địa chỉ domain của bạn)
