<div class="modal d-none" :class="{ 'd-flex': open }" x-show="open">
	<div class="modal__overlay" @click="open = false"></div>
	<div class="modal__block" >
		<button class="modal__close" @click="open = false"><svg xmlns="http://www.w3.org/2000/svg" width="26.163" height="26.163" viewBox="0 0 26.163 26.163"><g data-name="Group 49" fill="none" stroke="#000" stroke-linecap="round" stroke-width="4"><path data-name="Line 68" d="M2.828 2.829l20.506 20.506"/><path data-name="Line 141" d="M2.828 23.335L23.334 2.829"/></g></svg></button>
		<?php echo do_shortcode($shortcode); ?>
	</div>
</div>
