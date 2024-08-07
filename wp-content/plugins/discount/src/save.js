/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from "@wordpress/block-editor";

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#save
 *
 * @return {Element} Element to render.
 */
export default function save() {
	let products = JSON.parse(data.products);
	return (
		<div {...useBlockProps.save()}>
			<h2>Discount products</h2>
			<div className="discount_cards">
				{products.map((product) => (
					<div className="discount_card">
						<div
							className="card__img"
							dangerouslySetInnerHTML={{ __html: product["image"] }}
						></div>
						<div className="card__content">
							<h4 className="product_title">{product["title"]}</h4>
							<p className="product_price">{product["regular_price"]}</p>
							<p className="product_sale_price">{product["sale_price"]}</p>
						</div>
					</div>
				))}
			</div>
		</div>
	);
}
