renderCompareTable();
renderCompareCount();
setAllCompareButtonsState();
setAllCompareButtonsListeners();

const compareClearButton = document.querySelector('[data-role="compareClearButton"]');
if (compareClearButton) {
    compareClearButton.addEventListener("click", function() {
        clearCompareData();    
    });
}

function afterFilterComplete() {
    setAllCompareButtonsState();
    setAllCompareButtonsListeners();
}

function addToCompareList(productId) {
    // Get the current comparison list from the cookie
    const compareList = getCompareList();

    // Check if the product is already in the comparison list
    if (!compareList.includes(productId)) {
        // Check if the comparison list has reached its limit
        if (compareList.length >= compareMaxCount) {
            showCompareListLimitWarning();
            return;
        }

        // Add the product to the comparison list
        compareList.push(productId);
        updateCompareListCookie(compareList);

        // Update the button text and class
        updateCompareButtonState(productId);

        renderCompareCount();
    }
}

function removeFromCompareList(productId) {
    // Get the current comparison list from the cookie
    const compareList = getCompareList();

    // Check if the product is in the comparison list
    if (compareList.includes(productId)) {
        // Remove the product from the comparison list
        const index = compareList.indexOf(productId);
        compareList.splice(index, 1);
        updateCompareListCookie(compareList);

        // Update the button text and class
        updateCompareButtonState(productId);

        // Update comparison table
        renderCompareTable();

        renderCompareCount();
    }
}


function setAllCompareButtonsListeners() {
    // Add event listener to the each compare button
    const compareButtons = document.querySelectorAll("[data-role='compareButton']");
    if (compareButtons.length == 0) {
        return;
    }

    compareButtons.forEach(button => {
        button.addEventListener("click", function() {
            const productId = this.dataset.id;
            const action = this.dataset.action;
            if (action === "addToCompareList") {
                addToCompareList(productId);
            } else if (action === "removeFromCompareList") {
                removeFromCompareList(productId);
            }
        });
    });
}


function setAllCompareButtonsState() {
    // Set class and text to the each compare button

    // Get the current comparison list from the cookie
    const compareList = getCompareList();
    if (compareList.length == 0) {
        return;
    }

    compareList.forEach(productId => {
        const button = document.querySelector(`[data-id='${productId}']`);

        if (button) {
            button.innerText = "Удалить из сравнения";
            button.dataset.action = "removeFromCompareList";
            button.classList.add("compareButton_active");
        }
    });
}

function updateCompareButtonState(productId) {
    // Find the corresponding compare button for the product
    const compareButton = document.querySelector(`[data-id='${productId}']`);
    if (!compareButton) {
        return;
    }

    // Get the current comparison list from the cookie
    const compareList = getCompareList();

    // Check if the product is in the comparison list
    if (compareList.includes(productId)) {
        compareButton.innerText = "Удалить из сравнения";
        compareButton.dataset.action = "removeFromCompareList";
        compareButton.classList.add("compareButton_active");

        compareButton.addEventListener("click", function() { removeFromCompareList(this.dataset.id); });
    } else {
        compareButton.innerText = "Сравнить";
        compareButton.dataset.action = "addToCompareList";
        compareButton.classList.remove("compareButton_active");

        compareButton.addEventListener("click", function() { addToCompareList(this.dataset.id); });
    }
}


function getCompareList() {
    // Check if the cookie exists
    if (document.cookie.indexOf("compare_list") === -1) {
        return [];
    }

    // Extract the comparison list from the cookie
    const compareListCookie = document.cookie.split(";").find(cookie => cookie.trim().startsWith("compare_list="));
    const compareList = compareListCookie.split("=")[1].split(",");

    return compareList;
}


function updateCompareListCookie(compareList) {
    if (compareList.length > 0) {
        // Convert the comparison list array into a string
        const compareListString = compareList.join(",");

        // Set the cookie with the updated comparison list
        document.cookie = `compare_list=${compareListString};max-age=31536000;path=/`;
    } else {
        // Delete cookie
        document.cookie = "compare_list=;max-age=-1;path=/";
    }
}


function showCompareListLimitWarning() {
    alert(compareMaxCountMsg);
}


function renderCompareTable() {
    const tableWrapper = document.querySelector('[data-role="compareTable"]');
    if (!tableWrapper) {
        return;
    }

    const compareList = getCompareList();
    if (compareList.length !== 0) {
        fetch("/compare-list-render", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ products: compareList })
        })
        .then(response => response.text())
        .then(html => {
            tableWrapper.innerHTML = html;

            setAllCompareButtonsState();
            setAllCompareButtonsListeners();
        })
    } else {
        tableWrapper.innerHTML = '';
    }
}

function clearCompareData() {
    // Clear comparison "compare_list" cookies and clear HTML in comparison table    
    const compareList = [];
    updateCompareListCookie(compareList);

    renderCompareCount();
    renderCompareTable();
}

function renderCompareCount() {
    // Get the current comparison list from the cookie
    const compareList = getCompareList(); 
    const count = compareList.length;

    const compareCountWrap = document.querySelector('[data-role="compareCountWrap"]');
    const compareCount = document.querySelector('[data-role="compareCount"]');

    if (compareCountWrap) {
        compareCount.innerHTML = count ? count : '';
        compareCountWrap.classList.add("compareCountWrap_active");
        compareCount.classList.add("compareCount_active");
    }
}
