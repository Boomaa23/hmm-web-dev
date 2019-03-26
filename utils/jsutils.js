function copyToClipboard(stringCopy) {
  var copyText = document.getElementById("" + stringCopy);
  copyText.focus();
  copyText.select();
  document.execCommand('copy');
}
