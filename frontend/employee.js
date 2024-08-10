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