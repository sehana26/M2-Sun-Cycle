// Retrieve query parameters from the URL
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);

// Populate the rental bar in trial.php with the retrieved values
const selectedCity = urlParams.get("city");
const startDate = urlParams.get("start_date");
const startTime = urlParams.get("start_time");
const endDate = urlParams.get("end_date");
const endTime = urlParams.get("end_time");

document.getElementById("city").value = selectedCity;
document.getElementById("start-date").value = startDate;
document.getElementById("start-time").value = startTime;
document.getElementById("end-date").value = endDate;
document.getElementById("end-time").value = endTime;

const bikeTypeFilter = document.getElementById("bike-type-filter");
const products = document.querySelectorAll(".product");

bikeTypeFilter.addEventListener("change", filterBikes);

function filterBikes() {
    const selectedType = bikeTypeFilter.value;

    products.forEach(product => {
        const bikeType = product.getAttribute("data-type");

        if (selectedType === "all" || bikeType === selectedType) {
            product.style.display = "block";
        } else {
            product.style.display = "none";
        }
    });
}
let selectedBikes = []; // To store selected bike details

// Function to open the modal
function openModal() {
const selectedBikesElement = document.getElementById("selected-bikes");
const totalAmountElement = document.getElementById("total-amount");

// Clear the modal content
selectedBikesElement.innerHTML = '';

// Populate the modal with selected bikes and compute the total amount
let totalAmount = 0;
selectedBikes.forEach(bike => {
    const bikeName = bike.name;
    const bikePrice = bike.price;
    totalAmount += bikePrice;
    const bikeItem = document.createElement('div');
    bikeItem.innerHTML = `<p>${bikeName} - $${bikePrice}</p>`;
    selectedBikesElement.appendChild(bikeItem);
});

totalAmountElement.innerHTML = `$${totalAmount}`;

modal.style.display = "block";
}

// Function to close the modal
function closeModal() {
modal.style.display = "none";
}

// Function to add an item to the cart and update the cart item count
function addItemToCart(bikeName, bikePrice) {
// Increment the item count
const itemCountElement = document.getElementById("cart-item-count");
const itemCount = parseInt(itemCountElement.innerHTML);
itemCountElement.innerHTML = itemCount + 1;

// Add the selected item to the list
selectedBikes.push({ name: bikeName, price: bikePrice });
}

// Function to handle the cart icon click event
function cartIconClick() {
openModal();
}

// Function to handle the "Rent Now" button click event
function rentButtonClicked(bikeName, bikePrice) {
// Add the selected item to the cart
addItemToCart(bikeName, bikePrice);

const bikeImageElement = document.getElementById("bike-image");
bikeImageElement.src = bikeImageSrc;

openModal();


}

// Get the cart icon element and add a click event listener
const cartIconElement = document.getElementById("cart-icon");
cartIconElement.addEventListener("click", cartIconClick);

// Get all the "Rent Now" buttons
const rentButtons = document.querySelectorAll(".rent-button");

rentButtons.forEach((button, index) => {
button.addEventListener("click", () => {
    // Get the corresponding bike details (you can adjust this based on your data)
    const productContainers = document.querySelectorAll(".product");
    const selectedProduct = productContainers[index];
    const bikeName = selectedProduct.querySelector("h2").textContent;
    const bikePrice = parseInt(selectedProduct.querySelector(".price").textContent.replace(/\D/g, "")); // Extract the price

    // Handle the "Rent Now" button click
    rentButtonClicked(bikeName, bikePrice);
});
});

// Close the modal when clicking the close button (X)
const modalCloseButton = document.getElementById("modal-close");
modalCloseButton.addEventListener("click", closeModal);

// Close the modal when clicking outside the modal content
const modal = document.getElementById("modal");
modal.addEventListener("click", (event) => {
if (event.target === modal) {
    closeModal();
}
});

// Close the modal when pressing the "Escape" key
document.addEventListener("keydown", (event) => {
if (event.key === "Escape") {
    closeModal();
}
});


// Function to open the modal
function openModal() {
const selectedBikesElement = document.getElementById("selected-bikes");
const totalAmountElement = document.getElementById("total-amount");

// Clear the modal content
selectedBikesElement.innerHTML = '';

// Populate the modal with selected bikes and compute the total amount
let totalAmount = 0;

selectedBikes.forEach((bike, index) => {
    const bikeName = bike.name;
    const bikePrice = bike.price;
    totalAmount += bikePrice;

    const bikeItem = document.createElement("div");
    bikeItem.innerHTML = `
        <p>${bikeName} - $${bikePrice}</p>
        <button class="delete-button" onclick="removeBike(${index})">Delete</button>
    `;

    selectedBikesElement.appendChild(bikeItem);
});

totalAmountElement.innerHTML = `$${totalAmount}`;

modal.style.display = "block";
}

// Function to remove a bike from the selection
function removeBike(index) {
selectedBikes.splice(index, 1);
openModal(); // Reopen the modal to reflect the updated selection
}



// ... (your existing JavaScript code)

// Function to handle the "Proceed" button click event
function proceedButtonClicked() {
    // Retrieve values from the page
    const selectedCity = document.getElementById("city").value;
    const startDate = document.getElementById("start-date").value;
    const startTime = document.getElementById("start-time").value;
    const endDate = document.getElementById("end-date").value;
    const endTime = document.getElementById("end-time").value;

    // Add selectedCity, startDate, startTime, endDate, and endTime as hidden inputs
    addHiddenInput("selectedCity", selectedCity);
    addHiddenInput("startDate", startDate);
    addHiddenInput("startTime", startTime);
    addHiddenInput("endDate", endDate);
    addHiddenInput("endTime", endTime);

    // Add selected bikes as hidden input
    const selectedBikesInput = document.createElement("input");
    selectedBikesInput.type = "hidden";
    selectedBikesInput.name = "selectedBikes";
    selectedBikesInput.value = JSON.stringify(selectedBikes);
    document.getElementById("checkoutForm").appendChild(selectedBikesInput);

    // Submit the form
    document.getElementById("checkoutForm").submit();
}

// Function to add a hidden input to the form
function addHiddenInput(name, value) {
    const hiddenInput = document.createElement("input");
    hiddenInput.type = "hidden";
    hiddenInput.name = name;
    hiddenInput.value = value;
    document.getElementById("checkoutForm").appendChild(hiddenInput);
}

// Get the "Proceed" button and add a click event listener
const proceedButton = document.getElementById("proceedButton");
proceedButton.addEventListener("click", proceedButtonClicked);
