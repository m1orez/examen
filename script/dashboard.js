const editBtn = document.getElementById("editBtn");
const saveBtn = document.getElementById("saveBtn");

editBtn.onclick = () => {
  document
    .querySelectorAll("#dashboardForm input[name]")

    .forEach((input) => {
      input.removeAttribute("readonly");
    });

  editBtn.style.display = "none";

  saveBtn.style.display = "block";
};
function removeAccount() {
  let confirmDelete = confirm(
    "Weet je zeker dat je jouw account wilt verwijderen?"
  );
  if (confirmDelete) {
    window.location = "./script/delete_account.php";
  }
}
