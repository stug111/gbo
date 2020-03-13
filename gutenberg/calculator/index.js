import { SLUG } from "../utils"
import "alpinejs"

const { __ } = wp.i18n
const { registerBlockType } = wp.blocks
const ServerSideRender = wp.serverSideRender

const TITLE = __("Калькулятор", SLUG)
const NAME_BLOCK = "calculator"

registerBlockType(`${SLUG}/${NAME_BLOCK}`, {
	title: TITLE,
	category: SLUG,
	keywords: [TITLE],
	edit() {
		return <ServerSideRender block={`${SLUG}/${NAME_BLOCK}`} />
	},
	save() {
		return null
	},
})
