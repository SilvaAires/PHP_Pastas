function onlyNumbers(num) {
    var er = /[^0-9]/g;
    er.lastIndex = 0;
    var input = num;
    if (er.test(input.value)) {
        input.value = input.value.replace(/[^0-9]/g, '');
    }
}

