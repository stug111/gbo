<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonial-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'testimonial';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$posts = get_field('posts');

global $post;

?>

<div id="<?php echo esc_attr($id); ?>" class="block-services <?php echo esc_attr($className); ?>">
	<?php foreach ($posts as $key => $post) : ?>
		<?php get_template_part( 'template-parts/components/services' ); ?>
	<?php endforeach; ?>
</div>


