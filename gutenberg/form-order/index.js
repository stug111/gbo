import { SLUG } from "../utils"
import edit from "./edit"

const { __ } = wp.i18n
const { registerBlockType } = wp.blocks

const TITLE = __("Форма заказать звонок", SLUG)
const NAME_BLOCK = "form-order"

registerBlockType(`${SLUG}/${NAME_BLOCK}`, {
	title: TITLE,
	category: SLUG,
	keywords: [TITLE],
	edit,
	save() {
		return null
	},
})
