<?php
$elementyNaStronie=$data['paging']['elementyNaStronie'];
$ileNaStronieDlugosc=$elementyNaStronie*$data['paging']['aktywnaStrona'];
$n=0;
$z=1;
$j=1;
foreach($data['min'] as $index=>$image) :
    if($index<$ileNaStronieDlugosc-$elementyNaStronie){
        continue;

    }
    if($index==$ileNaStronieDlugosc){
        break;
    }



    ?>
    <?php if($data['paging']['aktywnaStrona']==$z && $n<$data['paging']['elementyNaStronie']){ ?>
<div class="photo">
    <figure>
         <a  href="<?php echo $data['watermark'][$index]?>" target="_blank">
             <img src="<?php echo $image ?>" />
        </a>
        <figcaption>
            Autor: <?php echo $data['autor'][$index]?>  </br>
            Tytuł: <?php echo $data['tytul'][$index]?>
        </figcaption>
    </figure>
</div>

<?php }  else if($data['paging']['aktywnaStrona']==$z && $n>=$data['paging']['elementyNaStronie'] &&$n<=$j*$data['paging']['elementyNaStronie']) { ?>
    <div class="photo">
    <figure>
        <a  href="<?php echo $data['watermark'][$index]?>" target="_blank">
             <img src="<?php echo $image ?>" />
        </a>

        <figcaption>
            Autor: <?php echo $data['autor'][$index]?>  </br>
            Tytuł: <?php echo $data['tytul'][$index]?>
        </figcaption>
    </figure>
</div>
<?php } ?>

<?php $n++;   if($n==$data['paging']['elementyNaStronie']) {$z++; $j++;}?>


<?php endforeach;?>
