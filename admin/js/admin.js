document.addEventListener("DOMContentLoaded", () => {
    /**
     * Action for saving all settings
     * All savings process in one place in plugin
     */
    document.querySelector("button#save_settings").addEventListener("click", (event) => {
        event.preventDefault();

        let formData = new FormData(document.getElementById("settings_form"));

        // Set empty value for not checked checkboxes
        document.querySelectorAll("form#settings_form input[type=checkbox]").forEach((elem) => {
            if (!formData.has(elem.name)) {
                formData.set(elem.name, "");
            }
        });

        // Send data to server
        fetch(ajaxurl, {
            method: "POST",
            body: formData,
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.status == "success") {
                    addNotice("Параметры сохранены.", "success");
                } else {
                    addNotice("Параметры не сохранены.", "error");
                }
            })
            .catch((error) => addNotice("Параметры не сохранены.", "error"));

        return false;
    });
});

/**
 * Show message with status
 *
 * Statusses:
 * - success
 * - error
 * - warning
 * - info
 * @param {string} message
 * @param {string} status
 */
function addNotice(message, status = "error") {
    // Create element for notice
    let notice = document.createElement("div");
    notice.classList.add("notice", "notice-" + status, "is-dismissible");

    let messageElement = document.createElement("p");
    messageElement.innerText = message;

    notice.append(messageElement);

    document.querySelector("button#save_settings").after(notice);
}

/**
 * Add element to the group
 *
 * @param {string} groupName
 * @param {string} element
 */
function addElementToGroup(groupName, element) {
    let group = document.querySelector("." + groupName);

    let newElement = document.createElement("div");
    newElement.classList.add("row-" + groupName);
    newElement.innerHTML = element;

    let idElements = document.querySelectorAll("." + groupName + " .id");

    if (idElements.length > 0) {
        let newElementNumber = parseInt(idElements[--idElements.length].innerHTML) + 1;
        newElement.querySelector(".id").innerHTML = newElementNumber + ". ";
    }

    group.appendChild(newElement);
}
