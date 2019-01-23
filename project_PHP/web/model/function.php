<?php

    function image(){
        
            $link_foder = "image/";
            $link_image = $link_foder.basename($_FILES["fileToUpload"]['name']);
    //kiểm tra ảnh
   
    //b1: kiểm tra kích thước
            $size_file = $_FILES["fileToUpload"]['size'];
            if ($size_file > 5242880) {
              $err['fileUpload'] = "File bạn chọn không được quá 5MB";
            }
    //b2 kiểm tra hợp lệ file ảnh
    //pathinfo lấy kiểu file
    //PATHINFO_EXTENSION tên kiểu file file 

            $type_file = pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION);
            $type = array('png', 'jpg', 'jpeg', 'gif');
            if (!in_array(strtolower($type_file), $type)) {
                $err['fileUpload'] = "vui lòng chọn hình ảnh";
            }
   
    //b3: Kiểm tra tồn tại file chưa
            if (file_exists($link_image)) {
              $err['fileUpload'] = "File bạn chọn đã tồn tại trên hệ thống";
          }
    //đưa file lên server và thêm vào trong thư mục
    // print_r($err);
          if (empty($err)) {
               if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $link_image)) {
                   // echo "Bạn đã upload ảnh thành công";
                  
               } else {
                   echo "File bạn vừa upload gặp sự cố";
               }
           }
           return $link_image;
        }
    

?>