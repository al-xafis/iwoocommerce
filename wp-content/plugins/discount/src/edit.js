/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from "@wordpress/i18n";

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from "@wordpress/block-editor";

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import "./editor.scss";

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit() {
	let products = JSON.parse(data.products);
	return (
		<div {...useBlockProps()}>
			<h2>Discount products edit</h2>
			<div className="discount_cards">
				{products &&
					products.map((product, i) => (
						<div className="discount_card" key={i}>
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
