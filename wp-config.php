<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define( 'DB_NAME', 'trungtamyte' );

/** Username của database */
define( 'DB_USER', 'root' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', '' );

/** Hostname của database */
define( 'DB_HOST', 'localhost' );

/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'S2bB=ZZ)e`xIJfcP%j!M]{gy9Xse$A*F+K7yl#9Bil{a~bm7Ur9[GkmCjIGKI:pF' );
define( 'SECURE_AUTH_KEY',  'kEiy-c(@l} CUKvp,<cA2zl]7%u@<xnSJ:^cyUzUR-.BP&C/>D}H_yb;jid/)/`C' );
define( 'LOGGED_IN_KEY',    'uUh{szD*$j&dv|OabJq,=etW&6xQ9BGRVIz/?[&bN7Vy21Arm+p~fy,Q9LvN}+;p' );
define( 'NONCE_KEY',        '/<P^4hCXqG|De^Q ~r#uG}I7QUPMB/@GF&CpV{(g8w]6d$|S}ai/,))P-[w$@-I.' );
define( 'AUTH_SALT',        'Wf=R=+}iZQfkw1KXEuC}qiMPI@9NrU?3n1 [!Y88_H]=)[_DUARB&GL2Hyj[j_hr' );
define( 'SECURE_AUTH_SALT', '8x,*FwW*3t9h?nuf-^HFV!m3s;Am7nP?Xq1YgI)-ur=Cs{06Jrp.ex ^}aSl=;lK' );
define( 'LOGGED_IN_SALT',   'AKp<3S0ErZ7`T+Q_gc!cW,Fd5gI[@MF5Q>7O}!KM=nWT3MgnNc+Y/C&zmxf-/$<$' );
define( 'NONCE_SALT',       '4D,ZNvI7$Q $){+[3+f_~!0Y.S)mjnJx@GPbq0+ +:15WF1Y_uy^M?)bSgm0{.5+' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');
