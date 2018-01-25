//Проверка данных при входе
function login_form_validation_func(){
    var isValid = true;
    var email = document.getElementById('login_email').value;
    var pass = document.getElementById('login_pass').value;

    //Проверка на заполненность
    if (email.length==0){
        document.getElementById('loginEmailValidation').innerHTML=' email field must not be empty!'
        isValid = false;
    }else{
        //Валидация email
        //Проверим содержит ли значение введенное в поле email символы @ и .
        at = email.indexOf("@");
        dot = email.indexOf(".");
        //Если поле не содержит эти символы знач email введен не верно
        if (at<1 || dot <1 || at == email.length-1 || dot == email.length-1 ){
            document.getElementById('loginEmailValidation').innerHTML='wrong email format!';
            isValid = false;
        }
    }

    if (pass.length==0){
        document.getElementById('loginPassValidation').innerHTML=' password field must not be empty!'
        isValid = false;
    }

    return isValid;
}

//Проверка данных при регистрации
function signup_form_validation_func(){
    var isValid = true;

    var email = document.getElementById('signup_email').value;
    var pass = document.getElementById('signup_pass').value;
    var name = document.getElementById('signup_name').value;
    var surname = document.getElementById('signup_surname').value;
    var phone = document.getElementById('signup_phone').value;

    //Проверка на заполненность
    if (email.length==0){
        document.getElementById('signupEmailValidation').innerHTML=' email field must not be empty!'
        isValid = false;
    }else{
        //Валидация email
        //Проверим содержит ли значение введенное в поле email символы @ и .
        at = email.indexOf("@");
        dot = email.indexOf(".");
        //Если поле не содержит эти символы знач email введен не верно
        if (at<1 || dot <1 || at == email.length-1 || dot == email.length-1 ){
            document.getElementById('signupEmailValidation').innerHTML='wrong email format!';
            isValid = false;
        }
    }

    if (pass.length==0){
        document.getElementById('signupPassValidation').innerHTML='password field must not be empty!';
        isValid = false;
    }else{
        isOk = /[0-9a-zA-Z]{4,}/g.test(pass);
        if(!isOk){
            document.getElementById('signupPassValidation').innerHTML='password must contain 4 or more latin letters or digits!';
            isValid = false;
        }
    }

    if (name.length==0){
        document.getElementById('signupNameValidation').innerHTML='enter your name!';
        isValid = false;
    }else{
        //Только буквы
        isOk = /[^a-zA-Zа-яА-ЯёЁ .]/i.test(name); //true - есть цифры; false - нету цифр, только буквы

        if(isOk){
            document.getElementById('signupNameValidation').innerHTML='name must contain only letters!'
            isValid = false;
        }
    }

    if (surname.length==0){
        document.getElementById('signupSurnameValidation').innerHTML='enter your surname!';
        isValid = false;
    }else{
        //Только буквы
        isOk = /[^a-zA-Zа-яА-ЯёЁ .]/i.test(surname); //true - есть цифры; false - нету цифр, только буквы
        if(isOk) {
            document.getElementById('signupSurnameValidation').innerHTML = 'surname must contain only letters!';
            isValid = false;
        }
    }

    if (phone.length==0){
        document.getElementById('signupPhoneValidation').innerHTML='phone field must not be empty!';
        isValid = false;
    }else{
        //Только цифры
       isOk = /^\d{3,}$/.test(phone); // false - если есть что-то кроме цифр или меньше 3 символов
        if(!isOk) {
            document.getElementById('signupPhoneValidation').innerHTML = 'phone must contain three or more digits!';
            isValid = false;
        }
    }

    return isValid;
}


//Проверка данных при изменении информации аккаунта
function account_info_validation_func(){
    var isValid = true;

    var old_pass = document.getElementById('account_old_pass').value;
    var new_pass = document.getElementById('account_new_pass').value;
    var name = document.getElementById('account_name').value;
    var surname = document.getElementById('account_surname').value;
    var phone = document.getElementById('account_phone').value;

    //старый и новый пароли
    if (old_pass.length==0 && new_pass.length!=0 ){
        document.getElementById('oldPasswordValidation').innerHTML='enter your current password!';
        isValid = false;
    }
    else if(old_pass.length!=0 && new_pass.length==0){
        document.getElementById('newPasswordValidation').innerHTML='enter new password if you want to change!';
        isValid = false;
    }else if(old_pass.length!=0 && new_pass.length!=0){
        isOk_new = /[0-9a-zA-Z]{4,}/g.test(new_pass);
        if(!isOk_new){
            document.getElementById('newPasswordValidation').innerHTML='password must contain 4 or more latin letters or digits!';
            isValid = false;
        }
    }

    //имя
    if (name.length!=0){
        //Только буквы
        isOk = /[^a-zA-Zа-яА-ЯёЁ .]/i.test(name); //true - есть цифры; false - нету цифр, только буквы

        if(isOk){
            document.getElementById('nameValidation').innerHTML='name must contain only letters!'
            isValid = false;
        }
    }
    //фамилия
    if (surname.length!=0){
        //Только буквы
        isOk = /[^a-zA-Zа-яА-ЯёЁ .]/i.test(surname); //true - есть цифры; false - нету цифр, только буквы
        if(isOk) {
            document.getElementById('surnameValidation').innerHTML = 'surname must contain only letters!';
            isValid = false;
        }
    }
    //телефон
    if (phone.length!=0){
        //Только цифры
        isOk = /^\d{3,}$/.test(phone); // false - если есть что-то кроме цифр или меньше 3 символов
        if(!isOk) {
            document.getElementById('phoneValidation').innerHTML = 'phone must contain three or more digits!';
            isValid = false;
        }
    }

    return isValid;
}


//Проверка данных при добавлении нового элемента
function new_item_adding_validation_func(){
    var isValid = true;

    var name = document.getElementById('name').value;
    var file = document.getElementById('file_input').value;

    //имя
    if (name.length==0){
            document.getElementById('nameValidation').innerHTML='* enter element name';
            isValid = false;
    }

    //файд
    if (file.length==0){
        document.getElementById('fileInputValidation').innerHTML='* choose image';
        isValid = false;
    }else{
    isOk = /[^.]+\.jpg|jpeg|png/.test(file);
        if(!isOk){
            document.getElementById('fileInputValidation').innerHTML='* wrong file type. Choose image';
            isValid = false;
        }
    }

    return isValid;
}


//Проверка данных при добавлении нового гардероба
function new_wardrobe_validation_func(){
    var isValid = true;
    var name = document.getElementById('name').value;
    //имя
    if (name.length==0){
        document.getElementById('nameValidation').innerHTML='* enter wardrobe name';
        isValid = false;
    }
    return isValid;
}

//Проверка данных при добавлении нового образа
function new_outfit_validation_func(){
    var isValid = true;

    var name = document.getElementById('name').value;
    var declaration = document.getElementById('declaration').value;

    //имя
    if (name.length==0){
        document.getElementById('nameValidation').innerHTML='* enter outfit name';
        isValid = false;
    }

    //имя
    if (declaration.length==0){
        document.getElementById('declarationValidation').innerHTML='* enter outfit declaration';
        isValid = false;
    }

    return isValid;
}
