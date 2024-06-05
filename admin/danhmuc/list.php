
<div class="col-12">
        <h1>DANH SÁCH DANH MỤC</h1>
    <br>
    <a href="?act=adddm" class="btn btn-success">Thêm mới</a>
            <table class="table table-bordered border-primary">
                <tr>
                    
                    <th>ID</th>
                    <th>TÊN</th>
                
                </tr>
                <?php
                    foreach($listdanhmuc as $danhmuc){
                        extract($danhmuc);
                        $suadm="index.php?act=suadm&id=".$id;
                        $xoadm="index.php?act=xoadm&id=".$id;
                        echo '<tr>
                               
                                <td>'.$id.'</td>
                                <td>'.$name.'</td>
                                <td><a href="'.$suadm.'"><input type="button" value="Sửa"></a> 
                                <a  href="'.$xoadm.'"  ><input type="button"  value="Xóa"></a></td>
                            </tr>';
                    }
                ?>  
            </table>
      
        <div>
        <!-- <input type="button" value="CHỌN TẤT CẢ" onclick="ctt()">
                <input type="button" value="BỎ CHỌN TẤT CẢ" onclick="btt()">
                <input type="button" value="XÓA CÁC MỤC ĐÃ CHỌN"> -->
        </div>
</div>
<script>
    let chon = document.getElementById("chon");
    function ctt(){
        chon.checked = true;
    }
    function btt(){
        chon.checked = false;
    }
</script>