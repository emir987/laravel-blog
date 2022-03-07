let categoryForm = document.getElementsByClassName('category-form')[0];

let categoryNameElement = document.getElementsByName('name')[0];
let categoryDescriptionElement = document.getElementsByName('description')[0];

let errorMessageName = document.getElementsByClassName('error-message-name')[0];

let categoryRegex = /^[A-Za-z0-9 -!$%^&*()_+|~=`{}\[\]:";'<>?,.\/]+$/;
// let categoryRegex = /^[\w\W ]+$/; // za sve karaktere 

// live change with error border for title
categoryNameElement.addEventListener('focusout', function(event) {
    if (categoryRegex.test(categoryNameElement.value)) {
        categoryNameElement.classList.remove('error-border');
        errorMessageName.style.display='none';
    } else {
        categoryNameElement.classList.add('error-border');
        errorMessageName.style.display='block';
    }
});

// when we click the save button
categoryForm.addEventListener('submit', function(event){

    let isValid = true;

    if (!categoryRegex.test(categoryNameElement.value)) {
        categoryNameElement.classList.add('error-border');
        errorMessageName.style.display='block';
        isValid = false;
    } else {
        categoryNameElement.classList.remove('error-border');
        errorMessageName.style.display='none';
    }

    // Check if isValid = false
    if (!isValid) {
        event.preventDefault();
    }

});

