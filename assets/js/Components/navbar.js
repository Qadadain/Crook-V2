document.addEventListener('DOMContentLoaded', function() {
M.AutoInit();
    const elems = document.querySelectorAll('.dropdown-trigger');
    const instances = M.Dropdown.init(elems, options);
});
