<div id="stronicowanie">
    <?php if($data['paging']['aktywnaStrona']>1) { ?>
    <p><a href="<?php echo Resources::route('galeria/lista?page='.($data['paging']['aktywnaStrona']-1))?>">&#8606;</a>
    <?php
    }
    ?>
    <?php
    for($i=1; $i<=$data['paging']['ileStron']; $i++):
    ?>
    <a href="<?php echo Resources::route('galeria/lista?page='.$i)?>"<?php if($data['paging']['aktywnaStrona']==$i) echo 'class="active"'?>><?php echo $i?></a>
    <?php endfor ?>
    <?php if($data['paging']['aktywnaStrona']<$data['paging']['ileStron']){ ?>
        <a  href="<?php echo Resources::route('galeria/lista?page='.$data['paging']['ileStron']);  ?>">&#8608;</a></p>

    <?php } ?>
</div>