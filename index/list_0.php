
 <li>
    <h3><a href="<?php echo sys_href($data['channelId'],'list',$data['id'])?>"><?php echo $data['title']; ?></a></h3>
    <h4><?php echo date('Y-m-d',strtotime($data['dtTime'])); ?></h4>
    <div class="news_cont"><?php echo $data['content']; ?>
    </div>
    <a class="more" href="<?php echo sys_href($data['channelId'],'list',$data['id'])?>">阅读全文...</a>
</li>  