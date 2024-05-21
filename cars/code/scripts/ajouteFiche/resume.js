function updateCount(textarea) {
    const maxLength = textarea.maxLength;
    const currentLength = textarea.value.length;
    const charsRemaining = maxLength - currentLength;

    const charCountSpan = document.getElementById('charCount');
    if (charCountSpan) {
        charCountSpan.textContent = charsRemaining;
    }
}