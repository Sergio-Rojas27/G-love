const checkbox = document.getElementById('world');
const inputText = document.getElementById('distance');

checkbox.addEventListener('change', function() {
  if (checkbox.checked) {
    inputText.readOnly = true; 
    inputText.value = ''; 
  } else {
    inputText.readOnly = false;
  }
});