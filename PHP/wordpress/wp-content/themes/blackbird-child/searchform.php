<form method="get" class="searchform" action="<?php echo home_url('/'); ?>">
    <div>
        <input type="text" onfocus="if (this.value == 'Търсене') {
                    this.value = '';
                }" onblur="if (this.value == '') {
                            this.value = '<?php _e('Търсене', 'black-bird'); ?>';
                        }"  value="<?php _e('Търсене', 'black-bird'); ?>" name="s" id="search" />
        <input type="submit" id="searchsubmit" value="" />
    </div>
</form>
<div class="clear"></div>
<br/>
