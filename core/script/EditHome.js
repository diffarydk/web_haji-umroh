const uploadBox = document.querySelector(".upload-box"),
  previewImg = uploadBox.querySelector("img"),
  fileInput = uploadBox.querySelector("input"),
  downloadBtn = document.querySelector(".download-btn");

const loadFile = (e) => {
  const file = e.target.files[0]; // getting first user selected file
  if (!file) return; // return if user hasn't selected any file
  previewImg.src = URL.createObjectURL(file); // passing selected file url to preview img src
  previewImg.addEventListener("load", () => { // once img loaded
    document.querySelector(".wrapper").classList.add("active");
  });
}

const uploadImage = () => {
  const formData = new FormData();
  formData.append("gambar_baru", fileInput.files[0]);
}

downloadBtn.addEventListener("click", uploadImage);
fileInput.addEventListener("change", loadFile);
uploadBox.addEventListener("click", () => fileInput.click());
