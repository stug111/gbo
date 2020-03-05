import { isUndefined, pickBy } from "lodash"
import cn from "classnames"
import Slider from "react-slick"

const { __ } = wp.i18n
const { Component } = wp.element
const { withSelect } = wp.data

class CarouselServices extends Component {
	constructor() {
		super(...arguments)
	}

	render() {
		const { latestServices } = this.props
		const settings = {
			dots: true,
			infinite: true,
			speed: 300,
			slidesToShow: 3,
			arrows: false,
			responsive: [
				{
					breakpoint: 992,
					settings: {
						slidesToShow: 2,
					},
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 1,
						centerMode: true,
					},
				},
			],
		}

		if (latestServices === null) {
			return "Загрузка..."
		}

		return (
			<div class="home-price">
				<div class="container">
					<Slider className="home-price__carousel" {...settings}>
						{latestServices.map((item, index) => (
							<div
								className={cn("home-price__item", {
									"home-price__item--favorite": item.acf.favorite,
								})}
								key={index}
							>
								<div
									className="home-price__title"
									dangerouslySetInnerHTML={{ __html: item.title.rendered }}
								/>
								<div className="home-price__main-price">
									{__("4 цилиндра", "gbomotors")}
									<span>{item.acf["4cilindra"]} ₽</span>
								</div>
								<div className="home-price__prices">
									<div className="home-price__price">
										{__("6 цилиндров", "gbomotors")}
										<span>{item.acf["6cilindra"]} ₽</span>
									</div>
									<div className="home-price__price">
										{__("8 цилиндров", "gbomotors")}
										<span>{item.acf["8cilindra"]} ₽</span>
									</div>
								</div>
								<div className="home-price__list">
									<div className="home-price__list-item">
										{__("ЭБУ", "gbomotors")}
										<span>{item.acf.eby}</span>
									</div>
									<div className="home-price__list-item">
										{__("Форсунки", "gbomotors")}
										<span>{item.acf.forcynki}</span>
									</div>
									<div className="home-price__list-item">
										{__("Редуктор", "gbomotors")}
										<span>{item.acf.redyktor}</span>
									</div>
									<div className="home-price__list-item">
										{__("Бак тороидальный", "gbomotors")}
										<span>{item.acf.bak}</span>
									</div>
								</div>
								<div className="home-price__footer">
									<a className="home-price__footer-price" href="#">
										{__("Посмотреть полный прайс-лист", "gbomotors")}
									</a>
									<button className="home-price__footer-button">
										{__("Оставить заявку", "gbomotors")}
									</button>
									<a className="home-price__footer-rass" href="#">
										{__("Оформить рассрочку", "gbomotors")}
									</a>
								</div>
							</div>
						))}
					</Slider>
				</div>
			</div>
		)
	}
}

export default withSelect((select, props) => {
	const { getEntityRecords } = select("core")
	const latestServicesQuery = pickBy(
		{
			per_page: 10,
		},
		value => !isUndefined(value)
	)
	return {
		latestServices: getEntityRecords("postType", "services", latestServicesQuery),
	}
})(CarouselServices)
