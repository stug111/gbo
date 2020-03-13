import { SLUG } from "../utils"
import { isUndefined, pickBy } from "lodash"

const { __ } = wp.i18n
const { Component, Fragment } = wp.element
const ServerSideRender = wp.serverSideRender
const { withSelect } = wp.data
const { InspectorControls } = wp.blockEditor
const { PanelBody, QueryControls } = wp.components

const NAME_BLOCK = "reviews"

class Reviews extends Component {
	constructor() {
		super(...arguments)
	}

	render() {
		const { attributes, setAttributes } = this.props
		const { order, orderBy, postsToShow } = attributes

		const numberOfItems = postsToShow

		const inspectorControls = (
			<InspectorControls>
				<PanelBody title={__("Sorting and Filtering")}>
					<QueryControls
						{...{ orderBy, order, numberOfItems }}
						onOrderChange={order => setAttributes({ order })}
						onOrderByChange={orderBy => setAttributes({ orderBy })}
						onNumberOfItemsChange={numberOfItems => setAttributes({ numberOfItems })}
					/>
				</PanelBody>
			</InspectorControls>
		)

		return (
			<Fragment>
				{inspectorControls}
				<ServerSideRender block={`${SLUG}/${NAME_BLOCK}`} attributes={attributes} />
			</Fragment>
		)
	}
}

export default withSelect((select, props) => {
	const { postsToShow, order, orderBy } = props.attributes
	const { getEntityRecords } = select("core")
	const latestReviewsQuery = pickBy(
		{
			order,
			orderby: orderBy,
			per_page: postsToShow,
		},
		value => !isUndefined(value)
	)
	return {
		latestReviews: getEntityRecords("postType", "review", latestReviewsQuery),
	}
})(Reviews)
