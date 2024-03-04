<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php ale_part('template-services-domains-post-type');?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>