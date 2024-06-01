function filterOptions() {
    var input, filter, options, option, i;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    options = document.querySelectorAll('.custom-option');
    for (i = 0; i < options.length; i++) {
        option = options[i];
        if (option.textContent.toUpperCase().indexOf(filter) > -1) {
            option.style.display = "";
        } else {
            option.style.display = "none";
        }
    }
}

document.addEventListener('click', function(e) {
    var dropdown = document.querySelector('.custom-dropdown');
    if (!dropdown.contains(e.target)) {
        var options = dropdown.querySelector('.custom-dropdown-options');
        options.style.display = 'none';
    }
});

document.querySelector('.custom-dropdown-header').addEventListener('click', function() {
    var options = this.parentElement.querySelector('.custom-dropdown-options');
    if (options.style.display === 'block') {
        options.style.display = 'none';
    } else {
        options.style.display = 'block';
    }
});
