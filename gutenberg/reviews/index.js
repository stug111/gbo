import { SLUG } from "../utils"
import edit from "./edit"
import "../../src/js/reviews"

const { __ } = wp.i18n
const { registerBlockType } = wp.blocks

const TITLE = __("Отзывы", SLUG)
const NAME_BLOCK = "reviews"

registerBlockType(`${SLUG}/${NAME_BLOCK}`, {
	title: TITLE,
	category: SLUG,
	keywords: [TITLE],
	edit,
	save() {
		return null
	},
})
