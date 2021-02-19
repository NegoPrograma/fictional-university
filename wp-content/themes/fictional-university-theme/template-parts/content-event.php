<div class="event-summary">
          <a class="event-summary__date t-center" href="<?php echo get_the_permalink();?>">
            <span class="event-summary__month"><?php echo apply_filters('convert_timestamp_to_date',get_field('event_date'),'M');            ?></span>
            <span class="event-summary__day"><?php echo apply_filters('convert_timestamp_to_date',get_field('event_date'),'d');;?></span>
          </a>
          <div class="event-summary__content">
            <h5 class="event-summary__title headline headline--tiny"><a href="<?php echo get_the_permalink();?>"><?php the_title();?></a></h5>
            <p><?php echo wp_trim_words(get_the_content(), 18);?> <a href="<?php echo get_the_permalink();?>" class="nu gray">Learn more</a></p>
          </div>
</div>