import { SLUG } from "../utils"
import edit from "./edit"

const { __ } = wp.i18n
const { registerBlockType } = wp.blocks

const TITLE = __("Карусель услуг", SLUG)
const NAME_BLOCK = "home-price"

registerBlockType(`${SLUG}/${NAME_BLOCK}`, {
	title: TITLE,
	category: SLUG,
	keywords: [TITLE],
	edit,
	supports: {
		align: ["full"],
	},
})
