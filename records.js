// Select necessary elements
const form = document.getElementById("addRecordForm");
const tableBody = document.getElementById("recordsTableBody");

// Array to store patient records
let patientRecords = [];

// Function to render records in the table
function renderTable() {
    tableBody.innerHTML = patientRecords
        .map((record, index) => `
            <tr>
                <td>${index + 1}</td>
                <td>${record.name}</td>
                <td>${record.age}</td>
                <td>${record.address}</td>
                <td>${record.phone}</td>
                <td>
                    <select class="status-dropdown" data-index="${index}">
                        <option value="Pending" ${record.status === "Pending" ? "selected" : ""}>Pending</option>
                        <option value="Done" ${record.status === "Done" ? "selected" : ""}>Done</option>
                        <option value="Absent" ${record.status === "Absent" ? "selected" : ""}>Absent</option>
                    </select>
                </td>
                <td><button class="btn delete-btn" data-index="${index}">Delete</button></td>
            </tr>
        `)
        .join("");

    // Add event listeners
    document.querySelectorAll(".status-dropdown").forEach(dropdown => {
        dropdown.addEventListener("change", (e) => {
            const index = e.target.dataset.index;
            patientRecords[index].status = e.target.value;
        });
    });

    document.querySelectorAll(".delete-btn").forEach(button => {
        button.addEventListener("click", (e) => {
            const index = e.target.dataset.index;
            deleteRecord(index);
        });
    });
}

// Function to add a new record
function addRecord(record) {
    if (patientRecords.length >= 10) {
        alert("Maximum of 10 records reached. Resetting records.");
        resetRecords();
    } else {
        patientRecords.push(record);
        renderTable();
    }
}

// Function to delete a specific record
function deleteRecord(index) {
    patientRecords.splice(index, 1);
    renderTable();
}

// Function to reset all records
function resetRecords() {
    patientRecords = [];
    renderTable();
}

// Form submission handler
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

    const newRecord = {
        name,
        age,
        address,
        phone,
        status: "Pending",
    };

    addRecord(newRecord);
    form.reset();
});
