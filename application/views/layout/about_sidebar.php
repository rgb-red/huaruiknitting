<h3 class="left_h3">
    <span><?=CONFIG($this->LAN)["title_2"]?></span>
</h3>
<div class="left_column">
    <ul class="left_nav_ul" id="firstpane">
        <li><a href="/home/profile" class="biglink <?php if($sort == 1):?>left_active<?php endif;?>"><?=CONFIG($this->LAN)["title_2_1"]?></a></li>
        <li><a href="/home/ceo_speech" class="biglink <?php if($sort == 2):?>left_active<?php endif;?>"><?=CONFIG($this->LAN)["title_2_2"]?></a></li>
        <li><a href="/home/culture" class="biglink <?php if($sort == 3):?>left_active<?php endif;?>"><?=CONFIG($this->LAN)["title_2_3"]?></a></li>
        <li><a href="/home/facility" class="biglink <?php if($sort == 4):?>left_active<?php endif;?>"><?=CONFIG($this->LAN)["title_2_4"]?></a></li>
    </ul>
</div>