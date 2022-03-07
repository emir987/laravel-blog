let ckEditorBorderElement = document.getElementsByClassName('ck-editor')[0];
let errorMessageContent = document.getElementsByClassName('error-message-content')[0];
ckEditorBorderElement.classList.add('error-border');
ckEditorBorderElement.classList.add('error-border-radius');
errorMessageContent.style.display='block';