<div class="text-center">          
    <div class="btn-group">
            <?php foreach ($rows as $key => $value) { ?>
                <?php if ($value['active']==0) { ?>
			<?php if($order==""){?>
            <a href="javascript:paginacion('<?php echo $url;?>&q=<?php echo $query;?>&p=<?php echo $value['value'];?>&order=<?php echo $order;?>');" class="btn">
              <?php }else
			  {?>
			   <a href="javascript:_order('<?php echo $order;?>','<?php echo $url;?>&q=<?php echo $query;?>&p=<?php echo $value['value'];?>');" class="btn">
			        
					   <?php }
                            switch ($value['type']) {
                                case 1:
                                    echo $value['value'];
                                    break;
                                case 2:
                                    echo 'Anterior';
                                    break;
                                case 3:
                                    echo 'Siguiente';
                                    break;
                                default:
                                    break;
                            }
                        ?>
                    </a>
                <?php } else { ?>
                    <span class="btn btn-light" ><?php echo $value['value']; ?></span>
                <?php }  ?>

            <?php } ?>
    </div>
</div>
