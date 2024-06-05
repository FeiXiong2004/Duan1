<script>
var arrImg=[];
       arrImg[0]="./Slide/tacm7.png";
       arrImg[1]="./Slide/slider_4.webp";
       arrImg[2]="./Slide/slider_5.webp";
     var i=0;
      var clear = setInterval(function(){
            i++;
            if(i>arrImg.length-1){i=0}
        document.getElementById("banner").src=arrImg[i];
        },2500);

    
    function next(){
        i++;
            if(i>arrImg.length-1){i=0}
        document.getElementById("banner").src=arrImg[i];
    }
    function pre(){

            if(i>0){i--;
            }
            document.getElementById("banner").src=arrImg[i];

    }

    
</script>
        <!-- banner 1 -->
        <div class="web--banner slide" style="width:100%;height:500px">
            <img style="object-fit:cover" id="banner" src="./Slide/1.jpg" alt="" height="100% " width="100%">
            <!-- <button class="pre" onclick="pre()">&#10094;</button>
            <button class="next" onclick="next()">&#10095;</button> -->
        </div>