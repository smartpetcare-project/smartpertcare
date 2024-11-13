// Mapping tipe entitas ke teks dinamis untuk penggunaan dalam modal
const entityTypeMap = {
    article: "article",
    product: "product",
    category: "category", // Bisa ditambahkan entitas lainnya
    service: "service", // Misal ada service, dll.
};

let currentUUID = null;
let currentType = null;

function setDeleteForm(type, uuid) {
    currentUUID = uuid;
    currentType = type;

    const entityType = entityTypeMap[type] || "Unknown Entity";

    document.getElementById("delete-type").textContent = entityType;

    const form = document.getElementById(`${type}-delete-form-${uuid}`);
    if (form) {
        form.action = `/admin/${type}/${uuid}`;
    } else {
        console.error(`Form for ${type} with UUID ${uuid} not found.`);
    }

    const modal = new bootstrap.Modal(
        document.getElementById("confirmDeleteModal")
    );
    modal.show();
}

function submitDeleteForm() {
    if (currentUUID && currentType) {
        const form = document.getElementById(
            `${currentType}-delete-form-${currentUUID}`
        );
        if (form) {
            form.submit();
        } else {
            console.error(`Form for UUID ${currentUUID} not found.`);
        }
    } else {
        console.error("No UUID or type set for deletion.");
    }
}

function setChangeStatusForm(type, id, status) {
    var statusText = status === 0 ? "publish" : "unpublish";
    var statusTypeText = entityTypeMap[type] || "unknown";

    document.getElementById("status-change-text").textContent = statusText;
    document.getElementById("status-type").textContent = statusTypeText;

    var form = document.getElementById("change-status-form");
    form.action = "/admin/" + type + "/change-status/" + id;
    var modal = new bootstrap.Modal(
        document.getElementById("confirmChangeStatusModal")
    );
    modal.show();
}

function formatPrice(input) {
    let value = input.value.replace(/\D/g, "");
    input.value = new Intl.NumberFormat("id-ID").format(value);
    document.getElementById("price").value = value;
}

function previewImages(input) {
    const previewContainer = document.getElementById("filePreview");
    const files = input.files;
    let currentImageCount = 0;
    const maxImages = 4;

    if (currentImageCount + files.length > maxImages) {
        alert(`You can upload a maximum of ${maxImages} images.`);
        return;
    }

    Array.from(files).forEach((file) => {
        if (currentImageCount < maxImages) {
            const reader = new FileReader();
            reader.onload = function (e) {
                // Create image wrapper with delete button
                const imageWrapper = document.createElement("div");
                imageWrapper.classList.add("image-wrapper");

                const img = document.createElement("img");
                img.src = e.target.result;
                imageWrapper.appendChild(img);

                // Create delete button
                const deleteButton = document.createElement("span");
                deleteButton.innerHTML = "✕";
                deleteButton.classList.add("delete-button");
                deleteButton.addEventListener("click", () => {
                    previewContainer.removeChild(imageWrapper);
                    currentImageCount--;
                    input.disabled = false; // Enable input if limit not reached
                });
                imageWrapper.appendChild(deleteButton);

                previewContainer.appendChild(imageWrapper);
                currentImageCount++;
            };
            reader.readAsDataURL(file);
        }
    });

    // Disable input if max limit reached
    if (currentImageCount >= maxImages) {
        input.disabled = true;
    }
}

function previewImage(input, previewId) {
    const previewContainer = document.getElementById(previewId);
    const file = input.files[0];

    if (file) {
        previewContainer.innerHTML = ""; // Clear previous image
        const reader = new FileReader();
        reader.onload = function (e) {
            const img = document.createElement("img");
            img.src = e.target.result;
            previewContainer.appendChild(img);
        };
        reader.readAsDataURL(file);
    }
}

$(function () {
    "use strict";

    // Notify error messages
    if (typeof errorMessages !== "undefined" && errorMessages.length > 0) {
        errorMessages.forEach((error) => {
            Lobibox.notify("error", {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                position: "top right",
                icon: "bi bi-x-circle",
                msg: error,
            });
        });
    }

    // Notify success message
    if (typeof successMessage !== "undefined" && successMessage !== "") {
        Lobibox.notify("success", {
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: "top right",
            icon: "bi bi-check-circle",
            msg: successMessage,
        });
    }
});
