document.addEventListener('DOMContentLoaded', function() {
    M.AutoInit();
    var selectElems = document.querySelectorAll('select');
    var instancesSelect = M.FormSelect.init(selectElems, options);

    const dropdownElems = document.querySelectorAll('.dropdown-trigger');
    const instancesDropdown = M.Dropdown.init(dropdownElems, options);
});
