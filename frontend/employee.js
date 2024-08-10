const profileBtn = document.getElementById("view-profile");
const leaveBtn = document.getElementById("leave-request");
const viewLeaveBtn = document.getElementById("view-leaves");

const profile = document.getElementById("profile");
const leaveReq = document.getElementById("leave");
const leaveTable = document.getElementById("leave-table");

profileBtn.addEventListener('click', () => {
    profile.classList.toggle('show');
    leaveReq.classList.toggle('hide');
    leaveTable.classList.toggle('hide');
});

leaveBtn.addEventListener('click', () => {
    profile.classList.toggle('hide');
    leaveReq.classList.toggle('show');
    leaveTable.classList.toggle('hide');
});

viewLeaveBtn.addEventListener('click', () => {
    profile.classList.toggle('hide');
    leaveReq.classList.toggle('hide');
    leaveTable.classList.toggle('show');
});