let darkMode = localStorage.getItem('modes'); 
const darkModeToggle = document.querySelector('.toggler');

const enableDarkMode = () => {
    document.body.classList.add('darkmode');
    localStorage.setItem('modes', 'darkModes');
}

const disableDarkMode = () => {
    document.body.classList.remove('darkmode');
    localStorage.setItem('modes', null);
}
if (darkMode === 'darkModes') {
    enableDarkMode();
}

darkModeToggle.addEventListener('click', () => {
darkMode = localStorage.getItem('modes'); 
    
if (darkMode !== 'darkModes') {
    enableDarkMode();
} else {  
    disableDarkMode(); 
    }
});