function confirmDelete() {
    var btn= confirm('Do you want to delete this employee?')
    if(btn== true) {
        window.location= 'Actions.employee_manage';
        return true;
    }
    else{
        return false;
    }
}