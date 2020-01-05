const fileInput = document.querySelector('#file-selector input[type=file]');
  fileInput.onchange = () => {
    if (fileInput.files.length > 0) {
      const fileName = document.querySelector('#file-selector .file-name');
      fileName.textContent = fileInput.files[0].name;
    }
  }
