document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('add-advisory-form');
    const dateInput = document.getElementById('advisory_date');
    const typeInput = document.getElementById('advisory_type');
    const titleInput = document.getElementById('advisory_title');

    const emergencyList = document.getElementById('emergency-advisory-list');
    const scheduledList = document.getElementById('scheduled-advisory-list');

    // --- 1. Title Auto-Generation ---
    function updateTitle() {
        const type = typeInput.value;
        const dateStr = dateInput.value;

        if (dateStr) {
            const dateObj = new Date(dateStr);
            // Format date to 'Month dd, yyyy'
            const formattedDate = dateObj.toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            titleInput.value = `${type} Water Service Interruption on ${formattedDate}`;
        } else {
            titleInput.value = `${type} Water Service Interruption on [Date]`;
        }
    }

    // Update title on type or date change
    dateInput.addEventListener('change', updateTitle);
    typeInput.addEventListener('change', updateTitle);

    // Initial call to set the placeholder title
    updateTitle();


    // --- 2. Form Submission Handler ---
    form.addEventListener('submit', (event) => {
        event.preventDefault(); // Prevents page reload

        const type = typeInput.value;
        const title = titleInput.value.trim();
        const imageFile = document.getElementById('notice_image').files[0];

        if (!title || !imageFile) {
            alert('Please fill in the date and select a notice image.');
            return;
        }

        // --- SIMULATED FILE UPLOAD & DATA HANDLING ---
        // In a real application, you would send 'title', 'type', and 'imageFile'
        // to a server here (using fetch() or XMLHttpRequest).

        // For this client-side demo, we use a FileReader to get a temporary URL 
        // for the image to display in the modal content.
        const reader = new FileReader();
        reader.onload = function (e) {
            const tempImageUrl = e.target.result;

            // Construct the HTML content for the modal (with the image)
            const modalContentHTML = `
                <img class='w-full h-auto object-cover rounded-lg mb-4 shadow-md' 
                     src='${tempImageUrl}' alt='${title} Notice Map'>
                <p>This advisory is for a ${type.toLowerCase()} water service interruption.</p>
                <p>Date: ${title.match(/on\s(.*?)$/)?.[1] || 'TBD'}</p>
                <p>NOTE: In a real system, the image would be uploaded to a server, and the permanent URL would be used here. The modal data-content would be stored/retrieved from the server.</p>
            `;

            // Create the new link element
            const newLink = document.createElement('a');
            newLink.classList.add('lnav-link', 'block');
            if (type === 'Emergency') {
                newLink.classList.add('lnav-link-red');
            }

            // Embed the generated modal content into the data-content attribute
            newLink.setAttribute('data-content', modalContentHTML);

            // Set the link title
            newLink.innerHTML = `<h5 class="text-m font-semibold">${title}</h5>`;

            // Determine the target list and color class
            const targetList = type === 'Emergency' ? emergencyList : scheduledList;

            // Prepend the new advisory to the list (newest first)
            targetList.prepend(newLink);

            // --- 3. Clean up and feedback ---
            form.reset();
            updateTitle(); // Reset title
            alert(`Advisory "${title}" published under ${type}. (Note: This is client-side only and not saved permanently.)`);

            // Optional: Re-run your modal initialization script if it needs to attach 
            // listeners to the new link. Assuming 'initializeModal' is the function:
            if (typeof initializeModal === 'function') {
                initializeModal(newLink); // You would need a function to hook up the modal logic
            }
        };

        // Read the image file as a Data URL
        reader.readAsDataURL(imageFile);
    });
});


document.addEventListener('DOMContentLoaded', () => {
    const dropdownButton = document.getElementById('dropdownIssueButton');
    const dropdownMenu = document.getElementById('issueDropdown');
    const editButton = document.getElementById('editIssueButton');

    // New Modal ID
    const modal = document.getElementById('editAdvisoryModal');

    // Close buttons targeted by attribute and ID
    const closeButtons = document.querySelectorAll('[data-modal-hide="editAdvisoryModal"]');

    // --- Dropdown Logic ---
    const toggleDropdown = () => {
        dropdownMenu.classList.toggle('open');
    };

    dropdownButton.addEventListener('click', toggleDropdown);

    // Close dropdown when clicking outside
    document.addEventListener('click', (event) => {
        if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.remove('open');
        }
    });


    // --- Modal Logic (Show) ---
    const openModal = () => {
        dropdownMenu.classList.remove('open'); // Hide dropdown when modal opens
        modal.classList.remove('hidden'); // Show the modal
        modal.classList.add('modal-overlay'); // Apply the backdrop styling/centering
        document.body.style.overflow = 'hidden'; // Prevent scrolling the background
        modal.setAttribute('aria-hidden', 'false');
    };

    editButton.addEventListener('click', (e) => {
        e.preventDefault(); // Stop the default link behavior
        openModal();
    });

    // --- Modal Logic (Hide/Close) ---
    const closeModal = () => {
        modal.classList.add('hidden'); // Hide the modal
        modal.classList.remove('modal-overlay'); // Remove the backdrop styling
        document.body.style.overflow = ''; // Restore background scrolling
        modal.setAttribute('aria-hidden', 'true');
    };

    // 1. Listeners for all close buttons (X icon, Cancel button)
    closeButtons.forEach(button => {
        button.addEventListener('click', closeModal);
    });

    // 2. Close when clicking the backdrop (click on the modal element itself)
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeModal();
        }
    });

    // 3. Close with Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            closeModal();
        }
    });
});



document.addEventListener('DOMContentLoaded', () => {
            // Find all necessary elements using their IDs
            const dropdownButton = document.getElementById('dropdownIssueButton');
            const dropdownMenu = document.getElementById('issueDropdown');
            const editButton = document.getElementById('editIssueButton');

            // Modal elements
            const modal = document.getElementById('editIssueModal');
            const closeModalButtons = document.querySelectorAll('[data-modal-hide="editIssueModal"]'); // Targets X and Cancel

            // Form elements for auto-generation
            const advisoryType = document.getElementById('advisory_type_edit');
            const advisoryDate = document.getElementById('advisory_date_edit');
            const advisoryTitle = document.getElementById('advisory_title_edit');

            // --- Dropdown Logic ---
            const toggleDropdown = () => {
                dropdownMenu.classList.toggle('open');
            };

            if (dropdownButton) {
                dropdownButton.addEventListener('click', toggleDropdown);
            }

            // Close dropdown when clicking outside
            document.addEventListener('click', (event) => {
                const isClickInsideDropdown = dropdownButton && dropdownButton.contains(event.target);
                const isClickInsideMenu = dropdownMenu && dropdownMenu.contains(event.target);

                if (dropdownMenu && !isClickInsideDropdown && !isClickInsideMenu) {
                    dropdownMenu.classList.remove('open');
                }
            });


            // --- Modal Logic (Show/Hide) ---
            const openModal = () => {
                if (dropdownMenu) {
                    dropdownMenu.classList.remove('open'); // Hide dropdown when modal opens
                }
                if (modal) {
                    modal.classList.remove('hidden'); // Show the modal
                    document.body.style.overflow = 'hidden'; // Prevent scrolling the background
                    modal.setAttribute('aria-hidden', 'false');
                    // Run title generation immediately in case fields already have values
                    autoGenerateTitle();
                }
            };

            if (editButton) {
                editButton.addEventListener('click', (e) => {
                    e.preventDefault(); // Stop the default link behavior
                    openModal();
                });
            }

            const closeModal = () => {
                if (modal) {
                    modal.classList.add('hidden'); // Hide the modal
                    document.body.style.overflow = ''; // Restore background scrolling
                    modal.setAttribute('aria-hidden', 'true');
                }
            };

            // 1. Listeners for all close buttons (X icon, Cancel button)
            closeModalButtons.forEach(button => {
                button.addEventListener('click', closeModal);
            });

            // 2. Close when clicking the backdrop (click on the modal element itself)
            if (modal) {
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) {
                        closeModal();
                    }
                });
            }

            // 3. Close with Escape key
            document.addEventListener('keydown', (e) => {
                if (modal && e.key === 'Escape' && !modal.classList.contains('hidden')) {
                    closeModal();
                }
            });

            // --- Auto-Title Generation Logic ---
            const autoGenerateTitle = () => {
                if (!advisoryType || !advisoryDate || !advisoryTitle) return;

                const type = advisoryType.value;
                const dateString = advisoryDate.value; // Format is YYYY-MM-DD

                if (!type || !dateString) {
                    advisoryTitle.value = "Select type and date to generate title.";
                    return;
                }

                // Parse the YYYY-MM-DD date string
                // Using 'T00:00:00' ensures the date is interpreted at midnight UTC,
                // preventing timezone offsets from shifting the day.
                const date = new Date(dateString + 'T00:00:00');

                // Check if the date is valid
                if (isNaN(date.getTime())) {
                    advisoryTitle.value = "Invalid Date Selected.";
                    return;
                }

                // Format the date as "Month DD, YYYY"
                const options = { year: 'numeric', month: 'long', day: 'numeric' };
                const formattedDate = date.toLocaleDateString('en-US', options);

                // Construct the final title string
                const prefix = type.charAt(0).toUpperCase() + type.slice(1); // Capitalize first letter
                const finalTitle = `${prefix} Water Service Interruption on ${formattedDate}`;

                advisoryTitle.value = finalTitle;
            };

            // Attach listeners to relevant fields only if they exist
            if (advisoryType) {
                advisoryType.addEventListener('change', autoGenerateTitle);
            }
            if (advisoryDate) {
                advisoryDate.addEventListener('change', autoGenerateTitle);
            }

            // Set default date to today for a better demo experience, only if the field exists
            if (advisoryDate) {
                const today = new Date().toISOString().split('T')[0];
                advisoryDate.value = today;
            }


            // Initial call to generate title on load
            autoGenerateTitle();
        });