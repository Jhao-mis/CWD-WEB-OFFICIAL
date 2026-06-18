/**
 * Function to dynamically create a new row in the magazine archive table.
 * @param {string} title - The Issue Title.
 * @param {string} year - The Year of the issue.
 * @param {File} pdfFile - The PDF File object from the input.
 */
function addNewArchiveRow(title, year, pdfFile) {
    const tableBody = document.getElementById('archive-table-body');
    const newRow = document.createElement('tr');
    newRow.className = 'bg-white border-b hover:bg-blue-50';

    // For a client-side demo, we use the file name to create a mock-up 'View' link.
    // NOTE: A real server would handle the upload and provide a permanent URL.
    const mockPdfPath = `./documents/waterlife/${pdfFile.name}`;

    newRow.innerHTML = `
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
            ${title}
        </th>
        <td class="px-6 py-4 text-center">
            ${year}
        </td>
        <td class="px-6 py-4 text-center">
            <a href="${mockPdfPath}" target="_blank"
                class="font-medium text-[#1a589e] hover:underline">View</a>
        </td>
        <td class="px-6 py-4 text-center">
            <button onclick="this.closest('tr').remove();" 
                class="text-red-500 hover:text-red-700 font-medium text-xs transition duration-150">Delete</button>
        </td>
    `;

    // Insert the new row at the top of the table (most recent first)
    if (tableBody.firstChild) {
        tableBody.prepend(newRow);
    } else {
        tableBody.appendChild(newRow);
    }
}

// 1. Wait for the HTML content to fully load
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('add-issue-form');

    if (form) {
        // 2. Attach the submit event listener to the form
        form.addEventListener('submit', (event) => {
            event.preventDefault(); // <-- CRITICAL: Prevents page refresh on submit

            // 3. Gather data from form fields
            const title = document.getElementById('new_title').value.trim();
            const year = document.getElementById('new_year').value.trim();
            const pdfFile = document.getElementById('new_pdf_file').files[0];

            if (title && year && pdfFile) {
                // 4. Create and insert the new table row
                addNewArchiveRow(title, year, pdfFile);
                
                // 5. Clear the form for the next entry
                form.reset(); 
                
                // Optional: Provide visual feedback (you can use a better notification system)
                console.log(`Successfully added: ${title} (${year})`);
            } else {
                alert('Please ensure all fields are filled and a PDF file is selected.');
            }
        });
    }
});


// Function to toggle the visibility of the dropdown menu
function toggleDropdown(buttonId, dropdownId) {
    const button = document.getElementById(buttonId);
    const dropdown = document.getElementById(dropdownId);

    if (button && dropdown) {
        button.addEventListener('click', (event) => {
            event.stopPropagation(); // Prevents the document click listener from immediately closing it
            dropdown.classList.toggle('hidden');
        });

        // Close the dropdown if the user clicks outside of it
        document.addEventListener('click', (event) => {
            if (!dropdown.contains(event.target) && !button.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });
    }
}


