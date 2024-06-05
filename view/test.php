<style>
    .image{
    position: relative;
    overflow: hidden;
}
.image:hover .text{
    bottom: 0;
}

.images img{
    width: 100%;
    
}

 
.text{
    padding-top: 15px;
    text-align: center;
    position: absolute;
    bottom: -160px;
    transition: 0.5s ease-in-out;
    background-color: white;
    width: 100%;

}

.text a{
    color: #000;
    font-size: 24px;
    text-decoration: none;
}

.text a:hover{
    color: #ffa800;
}
.price{
    font-size: 20px;
    padding: 25px 0;
}

a.book{
    font-size: 20px;
    display: block;
    padding: 10px 0;
    background-color: #000;
    color: white;
}

.images{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr ;
    gap: 30px;


}
</style>

<div class="web--special">
            <p>SẢN PHẨM NỔI BẬT</p>
            <div class="web--special--block justify-content-center images ">
                <div class="special--product--item image">
                <div class="special--product--detail">
            <!-- <section class="image"> -->
                
            <img src="./upload/<?php echo $value['img']; ?>" alt="">

            <section class="text">
                <a href="?act=productdetail&id_sp=<?php echo $value['id']?>">
                <?php echo $value['name']; ?></a>
                <section class="price">
                Giá : <?php echo number_format($value['price']); ?> VNĐ
                </section>
                <a href="#" class="book">Book this tour</a>
            </section>
            <!-- </section> -->

                </div>
                </div>



            </div>
        </div>