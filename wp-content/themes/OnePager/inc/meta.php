<ul class="post_stats">
	<li class="b_date"><?php the_time( get_option('date_format') ); ?></li>
	<li class="b_cat"><?php the_category(', ') ?></li>
	<li class="b_user"><?php the_author() ?></li>
	<li class="b_comm"><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></li>
</ul>