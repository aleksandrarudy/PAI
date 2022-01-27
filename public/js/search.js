const search = document.querySelector('input[placeholder="search"]');
const imageContainer = document.querySelector(".gallery");

search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (images) {
            imageContainer.innerHTML = "";
            loadImages(images)
        });
    }
});

function loadImages(images) {
    images.forEach(image => {
        console.log(image);
        createImage(image);
    });
}

function createImage(images) {
    const template = document.querySelector("#image-template");

    const clone = template.content.cloneNode(true);

    const image = clone.querySelector("img");
    image.src = `/public/img/uploads/${images.image}`;
    console.log(images.image)

    imageContainer.appendChild(clone);
}
