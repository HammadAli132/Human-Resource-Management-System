const profileBtn = document.getElementById("view-profile");
const leaveBtn = document.getElementById("leave-request");
const viewLeaveBtn = document.getElementById("view-leaves");

const profile = document.getElementById("profile");
const leaveReq = document.getElementById("leave");
const leaveTable = document.getElementById("leave-table");

profileBtn.addEventListener('click', () => {
    profile.classList.toggle('show');
    leaveReq.classList.remove('show');
    leaveTable.classList.remove('show');
});

leaveBtn.addEventListener('click', () => {
    profile.classList.remove('show');
    leaveReq.classList.toggle('show');
    leaveTable.classList.remove('show');
});

viewLeaveBtn.addEventListener('click', () => {
    profile.classList.remove('show');
    leaveReq.classList.remove('show');
    leaveTable.classList.toggle('show');
});

const requestForm = document.getElementById("employee-leave");

requestForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const startDate = document.getElementById("start-date").value;
    const endDate = document.getElementById("end-date").value;
    document.getElementById("start-date").value = "";
    document.getElementById("end-date").value = "";
    insertIntoRequestTable(startDate, endDate);
    alert("Request Submitted");
});

function insertIntoRequestTable(SD, ED) {
    const table = document.getElementById('request-table');

    const row = document.createElement('tr');
    const sdTD = document.createElement('td');
    const edTD = document.createElement('td');
    const statTD = document.createElement('td');
    statTD.setAttribute('class', 'status');

    sdTD.innerText = SD;
    edTD.innerText = ED;
    statTD.innerText = "Pending";

    row.append(sdTD, edTD, statTD);

    table.appendChild(row);
}