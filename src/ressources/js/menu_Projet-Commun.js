document.addEventListener('DOMContentLoaded', () => {
    const allProvos = document.querySelectorAll('#provo5');
    const image2 = document.getElementById('provo1');
    const header = document.getElementById('carre');
    const header2 = document.getElementById('carre1');
    const textInput = document.getElementById('text-input');
    const inputContainer = document.getElementById('input-container');
    
    let activeHeader = null;
    
    allProvos.forEach((provo) => {
        provo.addEventListener('click', () => {
            activeHeader = header;
            textInput.value = activeHeader.textContent.trim();  
            inputContainer.style.display = 'flex';
            textInput.focus();
            console.log("focused : ", textInput);
        });
    })
    

    image2.addEventListener('click', () => {
        activeHeader = header2;
        textInput.value = activeHeader.textContent.trim();  
        inputContainer.style.display = 'flex';
        textInput.focus();
    });
    

    textInput.addEventListener('blur', () => {
        const newText = textInput.value.trim();
        if (newText && activeHeader) {
            activeHeader.textContent = newText;
        }
        textInput.value = ''; 
        inputContainer.style.display = 'none';  
        activeHeader = null;  
    });
});

