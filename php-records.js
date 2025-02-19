
// Select necessary elements
const form = document.getElementById("addRecordForm");
const tableBody = document.getElementById("recordsTableBody");

// Fetch records when page loads
document.addEventListener("DOMContentLoaded", fetchRecords);

// Function to fetch records and update the table
// function fetchRecords() {
//     fetch("fetch_records.php")
//         .then(response => response.json())
//         .then(data => {
//             console.log("Fetched records:", data); // Debugging
//             renderTable(data);
//         })
//         .catch(error => console.error("Error fetching records:", error));
// }
async function fetchRecords() {
    try {
        const response = await fetch("get_records.php"); // Fetch from backend
        const data = await response.json(); // Parse JSON

        if (data.error) {
            throw new Error(data.error);
        }

        patientRecords = data; // Store records in the array
        renderTable(); // Display records on the page
    } catch (error) {
        console.error("Error fetching records:", error);
    }
}

// Call fetchRecords when page loads
fetchRecords();


// Function to render records
function renderTable(records) {
    tableBody.innerHTML = ""; // Clear table before re-rendering
    records.forEach((record, index) => {
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${index + 1}</td>
            <td>${record.name}</td>
            <td>${record.age}</td>
            <td>${record.address}</td>
            <td>${record.phone}</td>
            <td>
                <select class="status-dropdown" data-id="${record.id}">
                    <option value="Pending" ${record.status === "Pending" ? "selected" : ""}>Pending</option>
                    <option value="Done" ${record.status === "Done" ? "selected" : ""}>Done</option>
                    <option value="Absent" ${record.status === "Absent" ? "selected" : ""}>Absent</option>
                </select>
            </td>
            <td>
                <button class="btn delete-btn" data-id="${record.id}">Delete</button>
            </td>
        `;
        tableBody.appendChild(row);
    });

    // Add event listeners for status updates
    document.querySelectorAll(".status-dropdown").forEach(dropdown => {
        dropdown.addEventListener("change", (e) => {
            updateStatus(e.target.dataset.id, e.target.value);
        });
    });

    // Add event listeners for delete buttons
    document.querySelectorAll(".delete-btn").forEach(button => {
        button.addEventListener("click", (e) => {
            deleteRecord(e.target.dataset.id);
        });
    });
}

// Function to add a new record
function addRecord(record) {
    fetch("add_record.php", {
        method: "POST",
        body: new URLSearchParams(record),
        headers: { "Content-Type": "application/x-www-form-urlencoded" }
    })
    .then(response => response.text())
    .then(data => {
        console.log("Add record response:", data); // Debugging
        if (data === "success") {
            fetchRecords(); // Refresh records
            form.reset();
        } else {
            alert("Error adding record: " + data);
        }
    })
    .catch(error => console.error("Error adding record:", error));
}

// Function to delete a record
function deleteRecord(id) {
    fetch("delete_record.php", {
        method: "POST",
        body: new URLSearchParams({ id }),
        headers: { "Content-Type": "application/x-www-form-urlencoded" }
    })
    .then(response => response.text())
    .then(data => {
        console.log("Delete record response:", data); // Debugging
        fetchRecords();
    })
    .catch(error => console.error("Error deleting record:", error));
}

// Function to update status
function updateStatus(id, newStatus) {
    fetch("update_status.php", {
        method: "POST",
        body: new URLSearchParams({ id, status: newStatus }),
        headers: { "Content-Type": "application/x-www-form-urlencoded" }
    })
    .then(response => response.text())
    .then(data => console.log("Update status response:", data))
    .catch(error => console.error("Error updating status:", error));
}

// Form submission event listener
form.addEventListener("submit", (e) => {
    e.preventDefault();

    const name = document.getElementById("name").value.trim();
    const age = document.getElementById("age").value.trim();
    const address = document.getElementById("address").value.trim();
    const phone = document.getElementById("phone").value.trim();

    if (!name || !age || !address || !phone) {
        alert("Please fill out all fields.");
        return;
    }

    addRecord({ name, age, address, phone, status: "Pending" });
});
