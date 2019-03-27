function copyToClipboard(stringCopy) {
  var copyText = document.getElementById("" + stringCopy);
  copyText.focus();
  copyText.select();
  document.execCommand('copy');
  clearSelection();
}

function clearSelection() {
  if (window.getSelection) {
    window.getSelection().removeAllRanges();
  }
  else if (document.selection) {
    document.selection.empty();
  }
}
