const fileUpload = document.getElementById('fileUpload');

if (fileUpload) {
  const fileButton = document.getElementById('customButton');
  const fileBanner = document.getElementById('restaurant-banner');

  fileButton.addEventListener('click', () => {
    fileUpload.click();
  });

  fileUpload.addEventListener('change', () => {
    let filePath = fileUpload.value;
    let fileName = filePath.split(/(\\|\/)/g).pop();
    let fileDot = fileName.lastIndexOf('.') + 1;
    let fileExtension = fileName.substr(fileDot, fileName.length).toLowerCase();

    let uploadStatus = true;
    let uploadMsg = '';

    if (
      !(
        fileExtension == 'jpg' ||
        fileExtension == 'jpeg' ||
        fileExtension == 'png' ||
        fileExtension == 'webp' ||
        fileExtension == 'jfif'
      )
    ) {
      uploadStatus = false;
      uploadMsg +=
        '<br>Escolha um arquivo no formato JPG, PNG, GIF, WebP ou JFIF.';
    }

    if (fileUpload.files[0].size > 5242880) {
      uploadStatus = false;
      uploadMsg += '<br>Escolha um arquivo menor que 5MB.';
    }

    if (uploadStatus) {
      var fileReader = new FileReader();
      fileReader.readAsDataURL(fileUpload.files[0]);

      fileReader.onload = function (e) {
        fileBanner.style.backgroundImage = 'url(' + e.target.result + ')';
      };

      uploadMsg = fileName;
    }

    document.getElementById('fileName').innerHTML = uploadMsg;
    return uploadStatus;
  });
}

const removeItem = document.querySelectorAll('.removeItem');

for (let i = 0; i < removeItem.length; i++) {
  removeItem[i].addEventListener('click', (e) => {
    var result = confirm('Deseja realmente remover o item?');
    if (result) {
      return true;
    }

    e.preventDefault();
  });
}

const divLogo = document.querySelectorAll('.logo');
console.log(divLogo);
