document.addEventListener("DOMContentLoaded", () => {
	const custom_selector = document.querySelector(".custom_selector");
	const selector_content = document.querySelector(".selector_content");

	if (custom_selector) {
		custom_selector.addEventListener("click", (e) => {
			if (selector_content.classList.contains("d-none")) {
				selector_content.classList.remove("d-none");
				console.log("open");
			} else {
				selector_content.classList.add("d-none");
				console.log("close");
			}
		});

		document.addEventListener("click", (e) => {
			console.log(e.target.classList.contains("custom_selector"));
			if (
				!selector_content.classList.contains("d-none") &&
				!e.target.classList.contains("custom_selector")
			) {
				selector_content.classList.add("d-none");
				console.log("close from doc");
			}
		});
	} else {
		console.log("none");
	}
});
