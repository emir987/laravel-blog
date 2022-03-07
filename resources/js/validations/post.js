let postForm = document.getElementsByClassName('post-form')[0];

let postTitleElement = document.getElementsByName('title')[0];
let postCategoryElement = document.getElementsByName('post-categories[]')[0];
let categoriesBtnGroupElement = document.getElementsByClassName('btn-group')[0];
let postContentElement = document.getElementsByName('content')[0];
let ckEditorBorderElement = document.getElementsByClassName('ck-editor')[0];
let ckEditorContentElement = document.getElementsByClassName('ck-content')[0];

let errorMessageTitle = document.getElementsByClassName('error-message-title')[0];
let errorMessageCategories = document.getElementsByClassName('error-message-categories')[0];
let errorMessageContent = document.getElementsByClassName('error-message-content')[0];

let postRegex = /^[A-Za-z0-9 -!$%^&*()_+|~=`{}\[\]:";'<>?,.\/]+$/;
// let postRegex = /^[\w\W ]+$/; // za sve karaktere 

// live change with error border for title
postTitleElement.addEventListener('focusout', function(event) {
    if (postRegex.test(postTitleElement.value)) {
        postTitleElement.classList.remove('error-border');
        errorMessageTitle.style.display='none';
    } else {
        postTitleElement.classList.add('error-border');
        errorMessageTitle.style.display='block';
    }
});

// live change with error border for categories
let selectCategoryListElements = document.querySelectorAll('.btn-group li');
selectCategoryListElements.forEach(element => {
    element.addEventListener('click', function(event) {
        categoriesBtnGroupElement.classList.remove('error-border');
        errorMessageCategories.style.display='none';
    });
});



// live change with error border for ckeditor
ckEditorBorderElement.addEventListener('focusout', function() {

    if (ckEditorContentElement.innerText.trim().length == 0) {
        ckEditorBorderElement.classList.add('error-border');
        ckEditorBorderElement.classList.add('error-border-radius');
        errorMessageContent.style.display='block';
    } else {
        ckEditorBorderElement.classList.remove('error-border');
        ckEditorBorderElement.classList.remove('error-border-radius');
        errorMessageContent.style.display='none';
    }
});

// when we click the save button
postForm.addEventListener('submit', function(event){

    let isValid = true;

    // Title
    if (!postRegex.test(postTitleElement.value)) {
        postTitleElement.classList.add('error-border');
        errorMessageTitle.style.display='block';
        isValid = false;
    } else {
        postTitleElement.classList.remove('error-border');
        errorMessageTitle.style.display='none';
    }

    // Categories
    if (postCategoryElement.selectedOptions.length == 0) {
        categoriesBtnGroupElement.classList.add('error-border');
        errorMessageCategories.style.display='block';
        isValid = false;
    } else {
        categoriesBtnGroupElement.classList.remove('error-border');
        errorMessageCategories.style.display='none';
    }

    // Content
    if (!postContentElement.innerText) {
        ckEditorBorderElement.classList.add('error-border');
        ckEditorBorderElement.classList.add('error-border-radius');
        errorMessageContent.style.display='block';
        isValid = false;
    } else {
        ckEditorBorderElement.classList.remove('error-border');
        ckEditorBorderElement.classList.remove('error-border-radius');
        errorMessageContent.style.display='none';
    }

    // Check if isValid = false
    if (!isValid) {
        event.preventDefault();
    }
    
});